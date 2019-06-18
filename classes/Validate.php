<?php

class Validate
{
    const ADMIN_PASSWORD_LENGTH = 8;
    const PASSWORD_LENGTH = 5;

    public static function isAnything()
    {
        return true;
    }

    /**
     * Check for e-mail validity
     *
     * @param string $email e-mail address to validate
     * @return bool Validity is ok or not
     */
    public static function isEmail($email)
    {
        return !empty($email);
    }

    /**
     * Check for MD5 string validity
     *
     * @param string $md5 MD5 string to validate
     * @return bool Validity is ok or not
     */
    public static function isMd5($md5)
    {
        return preg_match('/^[a-f0-9A-F]{32}$/', $md5);
    }

    /**
     * Check for SHA1 string validity
     *
     * @param string $sha1 SHA1 string to validate
     * @return bool Validity is ok or not
     */
    public static function isSha1($sha1)
    {
        return preg_match('/^[a-fA-F0-9]{40}$/', $sha1);
    }

    /**
     * Check for a float number validity
     *
     * @param float $float Float number to validate
     * @return bool Validity is ok or not
     */
    public static function isFloat($float)
    {
        return strval((float)$float) == strval($float);
    }

    public static function isUnsignedFloat($float)
    {
        return strval((float)$float) == strval($float) && $float >= 0;
    }

    /**
     * Check for an image size validity
     *
     * @param string $size Image size to validate
     * @return bool Validity is ok or not
     */
    public static function isImageSize($size)
    {
        return preg_match('/^[0-9]{1,4}$/', $size);
    }

    /**
     * Check for name validity
     *
     * @param string $name Name to validate
     * @return bool Validity is ok or not
     */
    public static function isName($name)
    {
        //tODO :
        return true;
    }

    /**
     * Check for image type name validity
     *
     * @param string $type Image type name to validate
     * @return bool Validity is ok or not
     */
    public static function isImageTypeName($type)
    {
        return preg_match('/^[a-zA-Z0-9_ -]+$/', $type);
    }

    /**
     * Check for a message validity
     *
     * @param string $message Message to validate
     * @return bool Validity is ok or not
     */
    public static function isMessage($message)
    {
        return !preg_match('/[<>{}]/i', $message);
    }

    /**
     * Check for a country name validity
     *
     * @param string $name Country name to validate
     * @return bool Validity is ok or not
     */
    public static function isCountryName($name)
    {
        return preg_match('/^[a-zA-Z -]+$/', $name);
    }

    /**
     * Check for HTML field validity (no XSS please !)
     *
     * @param string $html HTML field to validate
     * @return bool Validity is ok or not
     */
    public static function isCleanHtml($html, $allow_iframe = false)
    {
        $events = 'onmousedown|onmousemove|onmmouseup|onmouseover|onmouseout|onload|onunload|onfocus|onblur|onchange';
        $events .= '|onsubmit|ondblclick|onclick|onkeydown|onkeyup|onkeypress|onmouseenter|onmouseleave|onerror|onselect|onreset|onabort|ondragdrop|onresize|onactivate|onafterprint|onmoveend';
        $events .= '|onafterupdate|onbeforeactivate|onbeforecopy|onbeforecut|onbeforedeactivate|onbeforeeditfocus|onbeforepaste|onbeforeprint|onbeforeunload|onbeforeupdate|onmove';
        $events .= '|onbounce|oncellchange|oncontextmenu|oncontrolselect|oncopy|oncut|ondataavailable|ondatasetchanged|ondatasetcomplete|ondeactivate|ondrag|ondragend|ondragenter|onmousewheel';
        $events .= '|ondragleave|ondragover|ondragstart|ondrop|onerrorupdate|onfilterchange|onfinish|onfocusin|onfocusout|onhashchange|onhelp|oninput|onlosecapture|onmessage|onmouseup|onmovestart';
        $events .= '|onoffline|ononline|onpaste|onpropertychange|onreadystatechange|onresizeend|onresizestart|onrowenter|onrowexit|onrowsdelete|onrowsinserted|onscroll|onsearch|onselectionchange';
        $events .= '|onselectstart|onstart|onstop';

        if (preg_match('/<[\s]*script/ims', $html) || preg_match('/('.$events.')[\s]*=/ims', $html) || preg_match('/.*script\:/ims', $html)) {
            return false;
        }

        if (!$allow_iframe && preg_match('/<[\s]*(i?frame|form|input|embed|object)/ims', $html)) {
            return false;
        }

        return true;
    }


    /**
     * Check date formats like http://php.net/manual/en/function.date.php
     *
     * @param string $date_format date format to check
     * @return bool Validity is ok or not
     */
    public static function isPhpDateFormat($date_format)
    {
        // We can't really check if this is valid or not, because this is a string and you can write whatever you want in it.
        // That's why only < et > are forbidden (HTML)
        return preg_match('/^[^<>]+$/', $date_format);
    }

    /**
     * Check for date format
     *
     * @param string $date Date to validate
     * @return bool Validity is ok or not
     */
    public static function isDateFormat($date)
    {
        return (bool)preg_match('/^([0-9]{4})-((0?[0-9])|(1[0-2]))-((0?[0-9])|([1-2][0-9])|(3[01]))( [0-9]{2}:[0-9]{2}:[0-9]{2})?$/', $date);
    }

    /**
     * Check for date validity
     *
     * @param string $date Date to validate
     * @return bool Validity is ok or not
     */
    public static function isDate($date)
    {
        if (!preg_match('/^([0-9]{4})-((?:0?[0-9])|(?:1[0-2]))-((?:0?[0-9])|(?:[1-2][0-9])|(?:3[01]))( [0-9]{2}:[0-9]{2}:[0-9]{2})?$/', $date, $matches)) {
            return false;
        }
        return checkdate((int)$matches[2], (int)$matches[3], (int)$matches[1]);
    }

    public static function isDateOrNull($date)
    {
        if (is_null($date) || $date === '0000-00-00 00:00:00' || $date === '0000-00-00') {
            return true;
        }

        return self::isDate($date);
    }

    /**
     * Check for boolean validity
     *
     * @param bool $bool Boolean to validate
     * @return bool Validity is ok or not
     */
    public static function isBool($bool)
    {
        return $bool === null || is_bool($bool) || preg_match('/^(0|1)$/', $bool);
    }

    /**
     * Check for phone number validity
     *
     * @param string $number Phone number to validate
     * @return bool Validity is ok or not
     */
    public static function isPhoneNumber($number)
    {
        return preg_match('/^[+0-9. ()\/-]*$/', $number);
    }

    /**
     * Check for postal code validity
     *
     * @param string $postcode Postal code to validate
     * @return bool Validity is ok or not
     */
    public static function isPostCode($postcode)
    {
        return empty($postcode) || preg_match('/^[a-zA-Z 0-9-]+$/', $postcode);
    }

    /**
     * Check for table or identifier validity
     * Mostly used in database for ordering : ASC / DESC
     *
     * @param string $way Keyword to validate
     * @return bool Validity is ok or not
     */
    public static function isOrderWay($way)
    {
        return ($way === 'ASC' | $way === 'DESC' | $way === 'asc' | $way === 'desc');
    }

    /**
     * Check for table or identifier validity
     * Mostly used in database for ordering : ORDER BY field
     *
     * @param string $order Field to validate
     * @return bool Validity is ok or not
     */
    public static function isOrderBy($order)
    {
        return preg_match('/^[a-zA-Z0-9.!_-]+$/', $order);
    }

    /**
     * Check for table or identifier validity
     * Mostly used in database for table names and id_table
     *
     * @param string $table Table/identifier to validate
     * @return bool Validity is ok or not
     */
    public static function isTableOrIdentifier($table)
    {
        return preg_match('/^[a-zA-Z0-9_-]+$/', $table);
    }

    /**
     * Check for an integer validity
     *
     * @param int $value Integer to validate
     * @return bool Validity is ok or not
     */
    public static function isInt($value)
    {
        return ((string)(int)$value === (string)$value || $value === false);
    }

    /**
     * Check for an integer validity (unsigned)
     *
     * @param int $value Integer to validate
     * @return bool Validity is ok or not
     */
    public static function isUnsignedInt($value)
    {
        return ((string)(int)$value === (string)$value && $value < 4294967296 && $value >= 0);
    }

    /**
     * Check for an percentage validity (between 0 and 100)
     *
     * @param float $value Float to validate
     * @return bool Validity is ok or not
     */
    public static function isPercentage($value)
    {
        return (Validate::isFloat($value) && $value >= 0 && $value <= 100);
    }

    /**
     * Check for an integer validity (unsigned)
     * Mostly used in database for auto-increment
     *
     * @param int $id Integer to validate
     * @return bool Validity is ok or not
     */
    public static function isUnsignedId($id)
    {
        return Validate::isUnsignedInt($id); /* Because an id could be equal to zero when there is no association */
    }

    public static function isNullOrUnsignedId($id)
    {
        return $id === null || Validate::isUnsignedId($id);
    }

    /**
     * Check object validity
     *
     * @param object $object Object to validate
     * @return bool Validity is ok or not
     */
    public static function isLoadedObject($object)
    {
        return is_object($object) && $object->id;
    }

    /**
     * Check object validity
     *
     * @param int $object Object to validate
     * @return bool Validity is ok or not
     */
    public static function isColor($color)
    {
        return preg_match('/^(#[0-9a-fA-F]{6}|[a-zA-Z0-9-]*)$/', $color);
    }

    /**
     * Check if URL is absolute
     *
     * @param string $url URL to validate
     * @return bool Validity is ok or not
     */
    public static function isAbsoluteUrl($url)
    {
        if (!empty($url)) {
            return preg_match('/^(https?:)?\/\/[$~:;#,%&_=\(\)\[\]\.\? \+\-@\/a-zA-Z0-9]+$/', $url);
        }
        return true;
    }

    public static function isMySQLEngine($engine)
    {
        return (in_array($engine, array('InnoDB', 'MyISAM')));
    }

    /**
     * Check for standard name file validity
     *
     * @param string $name Name to validate
     * @return bool Validity is ok or not
     */
    public static function isFileName($name)
    {
        return preg_match('/^[a-zA-Z0-9_.-]+$/', $name);
    }

    /**
     * Check for standard name directory validity
     *
     * @param string $dir Directory to validate
     * @return bool Validity is ok or not
     */
    public static function isDirName($dir)
    {
        return (bool)preg_match('/^[a-zA-Z0-9_.-]*$/', $dir);
    }

    public static function isSubDomainName($domain)
    {
        return preg_match('/^[a-zA-Z0-9-_]*$/', $domain);
    }

    /**
     * Check if $data is a string
     *
     * @param string $data Data to validate
     * @return bool Validity is ok or not
     */
    public static function isString($data)
    {
        return is_string($data);
    }

    /**
     * Check for bool_id
     *
     * @param string $ids
     * @return bool Validity is ok or not
     */
    public static function isBoolId($ids)
    {
        return (bool)preg_match('#^[01]_[0-9]+$#', $ids);
    }

    /**
     * Check for PHP serialized data
     *
     * @param string $data Serialized data to validate
     * @return bool Validity is ok or not
     */
    public static function isSerializedArray($data)
    {
        return $data === null || (is_string($data) && preg_match('/^a:[0-9]+:{.*;}$/s', $data));
    }

    /**
     * Check if $string is a valid JSON string
     *
     * @param string $string JSON string to validate
     * @return bool Validity is ok or not
     */
    public static function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

    /**
     *
     * @param array $ids
     * @return bool return true if the array contain only unsigned int value
     */
    public static function isArrayWithIds($ids)
    {
        if (count($ids)) {
            foreach ($ids as $id) {
                if ($id == 0 || !Validate::isUnsignedInt($id)) {
                    return false;
                }
            }
        }
        return true;
    }
}
