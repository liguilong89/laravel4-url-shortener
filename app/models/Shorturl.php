<?php

class Shorturl extends Eloquent {
    protected $guarded = array('id', 'clicks');

    public static $rules = array(
    	'long_url' => 'required|url|unique:shorturls',
    );

     /**
     * @var string the characters used in building the short URL
     * 
     * YOU MUST NOT CHANGE THESE ONCE YOU START CREATING SHORTENED URLs!
     */
    protected static $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * Convert an integer to a short code.
     * 
     * This method does the actual conversion of the ID integer to a short code.
     * If successful, it returns the created code. If there is an error, an
     * exception is thrown.
     * 
     * @param int $id the integer to be converted
     * @return string the created short code
     * @throws Exception if an error occurs
     */
    public static function convertIntToShortCode($id) {
        $id = intval($id);
        if ($id < 1) {
            throw new \Exception( "The ID is not a valid integer");
        }

        $length = strlen(self::$chars);
        // make sure length of available characters is at
        // least a reasonable minimum - there should be at
        // least 10 characters
        if ($length < 10) {
            throw new \Exception("Length of chars is too small");
        }

        $code = "";
        while ($id > $length - 1) {
            // determine the value of the next higher character
            // in the short code should be and prepend
            $code = self::$chars[fmod($id, $length)] . $code;
            // reset $id to remaining value to be converted
            $id = floor($id / $length);
        }

        // remaining value of $id is less than the length of
        // self::$chars
        $code = self::$chars[$id] . $code;

        return $code;
    }
}