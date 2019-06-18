<?php
/**
 * @author    PKandré <pululuandre@gmail.com>
 * @copyright 2019-2020 PKandré
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 */

abstract class ObjectModel
{
    /**
     * List of field types
     */
    const TYPE_INT     = 1;
    const TYPE_BOOL    = 2;
    const TYPE_STRING  = 3;
    const TYPE_FLOAT   = 4;
    const TYPE_DATE    = 5;
    const TYPE_HTML    = 6;
    const TYPE_NOTHING = 7;
    const TYPE_SQL     = 8;

    /**
     * List of association types
     */
    const HAS_ONE  = 1;
    const HAS_MANY = 2;

    /** @var int Object ID */
    public $id;

    /**
     * @deprecated 1.5.0.1 Define property using $definition['table'] property instead.
     * @var string
     */
    protected $table;

    /**
     * @deprecated 1.5.0.1 Define property using $definition['table'] property instead.
     * @var string
     */
    protected $identifier;

    /**
     * @deprecated 1.5.0.1
     * @var array
     */
    protected $classes_assocation = array();

    /**
     * @var array Contains object definition
     */
    public static $definition = array();

    /**
     * Holds compiled definitions of each ObjectModel class.
     * Values are assigned during object initialization.
     *
     * @var array
     */
    protected static $loaded_classes = array();

    /** @var array Contains current object definition. */
    protected $def;

    /** @var array|null List of specific fields to update (all fields if null). */
    protected $update_fields = null;

    /**
     * Builds the object
     *
     * @param int|null $id If specified, loads and existing object from DB (optional).
     */
    public function __construct($id = null)
    {
        $class_name = get_class($this);
        if (!isset(ObjectModel::$loaded_classes[$class_name])) {
            $this->def = ObjectModel::getDefinition($class_name);
            if (!Validate::isTableOrIdentifier($this->def['primary']) || !Validate::isTableOrIdentifier($this->def['table'])) {
                echo('Identifier or table format not valid for class '.$class_name);
            }

            ObjectModel::$loaded_classes[$class_name] = get_object_vars($this);
        } else {
            foreach (ObjectModel::$loaded_classes[$class_name] as $key => $value) {
                $this->{$key} = $value;
            }
        }

        if ($id) {
            $entity_mapper = EntityMapper::load($id, $this, $this->def);
        }
    }

    /**
     * Returns object definition
     *
     * @param string      $class Name of object
     * @param string|null $field Name of field if we want the definition of one field only
     * @return array
     */
    public static function getDefinition($class)
    {
        $reflection = new ReflectionClass($class);

        if (!$reflection->hasProperty('definition')) {
            return false;
        }

        $definition = $reflection->getStaticPropertyValue('definition');
        $definition['classname'] = $class;

        return $definition;
    }

    /**
     * Adds current object to the database
     *
     * @param bool $auto_date
     * @param bool $null_values
     *
     * @return bool Insertion result
     */
    public function add($auto_date = true, $null_values = false)
    {
        if (isset($this->id)) {
            unset($this->id);
        }

        // Automatically fill dates
        if ($auto_date && property_exists($this, 'date_add')) {
            $this->date_add = date('Y-m-d H:i:s');
        }
        if ($auto_date && property_exists($this, 'date_update')) {
            $this->date_update = date('Y-m-d H:i:s');
        }

        // Database insertion
        //var_dump($this->getFields()); exit();
        if (!$result = Db::getInstance()->insert($this->def['table'], $this->getFields(), $null_values)) {
            return false;
        }

        // Get object id in database
        $this->id = Db::getInstance()->Insert_ID();

        if (!$result) {
            return false;
        }

        return $result;
    }

        /**
     * Updates the current object in the database
     *
     * @param bool $null_values
     *
     * @return bool
     */
    public function update($null_values = false)
    {
        // Automatically fill dates
        if (array_key_exists('date_update', $this)) {
            $this->date_update = date('Y-m-d H:i:s');
            if (isset($this->update_fields) && is_array($this->update_fields) && count($this->update_fields)) {
                $this->update_fields['date_update'] = true;
            }
        }

        // Automatically fill dates
        if (array_key_exists('date_add', $this) && $this->date_add == null) {
            $this->date_add = date('Y-m-d H:i:s');
            if (isset($this->update_fields) && is_array($this->update_fields) && count($this->update_fields)) {
                $this->update_fields['date_add'] = true;
            }
        }

        // Database update
        if (!$result = Db::getInstance()->update($this->def['table'], $this->getFields(), '`'.$this->def['primary'].'` = '.(int)$this->id, 0, $null_values)) {
            return false;
        }

        return $result;
    }

    /**
     * Deletes current object from database
     *
     * @return bool True if delete was successful
     */
    public function delete()
    {
        $result = true;
        if ($result && empty($classes_assocation)) {
            $result &= Db::getInstance()->delete($this->def['table'], '`'.$this->def['primary'].'` = '.(int)$this->id);
        }

        if(!empty($classes_assocation)){
            // TODO : Check classes name if exist and delet data for this where primary = current object
        }

        if (!$result) {
            return false;
        }

        return $result;
    }

    /**
     * Takes current object ID, gets its values from database,
     * saves them in a new row and loads newly saved values as a new object.
     *
     * @return ObjectModel|false
     */
    public function duplicateObject()
    {
        $definition = ObjectModel::getDefinition($this);

        $res = Db::getInstance()->getRow('
			SELECT *
			FROM `'._DB_PREFIX_.$definition['table'].'`
			WHERE `'.$definition['primary'].'` = '.(int)$this->id
        );

        if (!$res) {
            return false;
        }

        unset($res[$definition['primary']]);
        foreach ($res as $field => &$value) {
            if (isset($definition['fields'][$field])) {
                // TODO : Format value from type
                $value = $value;
            }
        }

        if (!Db::getInstance()->insert($definition['table'], $res)) {
            return false;
        }

        $object_id = Db::getInstance()->Insert_ID();

        /** @var ObjectModel $object_duplicated */
        $object_duplicated = new $definition['classname']((int)$object_id);

        return $object_duplicated;
    }

    public function getAll(){
        $definition = ObjectModel::getDefinition($this);

        if(empty($definition['table']))
            return array();

        $sql = new QueryBuilder();
        $sql->select('*');
        $sql->from($definition['table'], 'c');

        return Db::getInstance()->executeS($sql->build());
    }

    /**
     * Prepare fields for ObjectModel class (add, update)
     * All fields are verified (pSQL, intval, ...)
     *
     * @return array All object fields
     */
    public function getFields()
    {
        $this->validateFields();
        $fields = $this->formatFields();

        // Ensure that we get something to insert
        if (!$fields && isset($this->id) && Validate::isUnsignedId($this->id)) {
            $fields[$this->def['primary']] = $this->id;
        }

        return $fields;
    }
        /**
     * Checks if object field values are valid before database interaction
     *
     * @param bool $die
     * @param bool $error_return
     *
     * @return bool|string True, false or error message.
     */
    public function validateFields($die = true, $error_return = false)
    {
        foreach ($this->def['fields'] as $field => $data) {
            if (is_array($this->update_fields) && empty($this->update_fields[$field])) {
                continue;
            }

            $message = $this->validateField($field, $this->$field);
            if ($message !== true) {
                if ($die) {
                    echo($message);
                }
                return $error_return ? $message : false;
            }
        }

        return true;
    }

    /**
     * Validate a single field
     *
     * @param string   $field        Field name
     * @param mixed    $value        Field value
     *
     * @return true|string True or error message string.
     */
    public function validateField($field, $value)
    {
        $data = $this->def['fields'][$field];

        // Check if field is required
        if (!empty($data['required'])) {
            if (Tools::isEmpty($value)) {
                if ($human_errors) {
                    return 'The %s field is required :'.$field;
                } else {
                    return 'Property %s is empty.'.get_class($this).'->'.$field;
                }
            }
        }

        // Default value
        if (!$value && !empty($data['default'])) {
            $value = $data['default'];
            $this->$field = $value;
        }

        // Check field validator
        if (!empty($data['validate'])) {
            if (!method_exists('Validate', $data['validate'])) {
                echo 'Validation function not found: '.$data['validate']; exit();
            }
        }

        return true;
    }

    /**
     * Formats values of each fields.
     * @return array
     */
    protected function formatFields()
    {
        $fields = array();

        // Set primary key in fields
        if (isset($this->id)) {
            $fields[$this->def['primary']] = $this->id;
        }

        foreach ($this->def['fields'] as $field => $data) {

            if (is_array($this->update_fields)) {
                if (empty($this->update_fields[$field])) {
                    continue;
                }
            }

            $value = $this->$field;

            // TODO : Format field value
            $fields[$field] = $value;
        }

        return $fields;
    }
}
