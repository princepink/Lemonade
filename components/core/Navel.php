<?php
namespace Pearlpuppy\Lemonade;

/**
 *  @file   Navel
 *  @package    Lemonade
 *  @since  2025-08-20 (ver. 0.3.0)
 *  @update 2025-
 */

/**
 *  Static library for Lemonade
 */
class Navel
{

	// Mixins

    /**
     *
     */
    use Umbilical;

    // Constants

    /**
     *
     */
    public const FORMAT_LMNT = '<%1$s%2$s>%3$s</%1$s>';

    /**
     *
     */
    public const FORMAT_EMP = '<%1$s%2$s />';

    /**
     *  REGEX pattern for attribute name
     *      covering the case to use 'data-' attribute
     *  usable chars: lowercase alphabet, number, dash, underscore, dollar
     *  conditions:
     *      - the first char must be alphabet
     *      - the next (right after) char to dash must be alphabet
     */
    public const PAT_ATTRNAME = '/^[a-z](?:[a-z0-9_$]|-[a-z])*$/';

    /**
     *
     */
    public const FMT_PAT_SLC_IC = '/%s([a-zA-Z]+[\w|-]*)/';
    public const FMV_SYMBOL_ID = '#';
    public const FMV_SYMBOL_CL = '\.';

    /**
     *
     */
    public const PAT_SLC_TAG = '/^(h[1-6]|[a-z]+)/';
    public const PAT_SLC_ATTR = '/\[([^\]]*)\]/';
    public const PAT_SLC_ID = '/#([a-zA-Z]+[\w|-]*)/';
    public const PAT_SLC_CLASS = '/\.([a-zA-Z]+[\w|-]*)/';

    /**
     *
     */

    /**
     *
     */

    /**
     *
     */

    // Properties

    /**
     *
     */
    public static $selector_patterns = array(
        'tag' => self::PAT_SLC_TAG,
        'attrs' => self::PAT_SLC_ATTR,
        'id' => self::PAT_SLC_ID,
        'classes' => self::PAT_SLC_CLASS,
    );

    // Constructor

    /**
     *  This library class does not construct instances
     */
    private function __construct()
    {
        // STATIC USE ONLY
    }

    // Methods

    /**
     *
     */
    public static function isFormCntl(PQueue $object): bool
    {
        return in_array($object->tag, self::$form_controls);
    }

    /**
     *
     */
    public static function isEmptyLmnt(PQueue $object): bool
    {
        return in_array($object->tag, self::$empties);
    }

    /**
     *
     */
    public static function isInlineLmnt(PQueue $object): bool
    {
        return in_array($object->tag, self::$inlines);
    }

    /**
     *
     */

    /**
     *
     */

//[EOC]*/
}
