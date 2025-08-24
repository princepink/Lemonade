<?php
namespace Pearlpuppy\Lemonade;

/**
 *  @file   Cascabela
 *  @package    Lemonade
 *  @since  2018-11-23 (ver. 0.1.0)
 *  @update 2025-
 */

/**
 *  CSS selector receptor
 */
abstract class Cascabela extends Citron
{

    // Mixins

    /**
     *
     */

    // Constants

    /**
     *
     */
    public const SLU_TAG = 'tag';
    public const SLU_ATTR = 'attrs';
    public const SLU_ID = 'id';
    public const SLU_CLASS = 'classes';

    // Properties

    /**
     *
     */

    // Constructor

    /**
     *  A standard construction
     */
    public function __construct(string $selector = parent::DEFTAG, $contents = [])
    {
        extract($this->cracker($selector));
        // static $i = 0;
        // $this->assignTag($tag);
        // $this->assignAttrs($attrs, $classes);
        // $this->fairContents($contents);
        // extract($this->cracker($selector));
        parent::__construct($contents, $tag, $classes, $attrs);
        // $this->assign($i);
    }

    // Methods

    /**
     *
     */
    private function cracker(string $selector): array
    {
        $attrs = [];
        $tag = $this->crack(self::SLU_TAG, $selector);
        if (!$tag) {
            $tag = parent::DEFTAG;
        }
        $id = $this->crack(self::SLU_ID, $selector);
        if ($id) {
            $attrs['id'] = $id;
        }
        $classes = $this->crack(self::SLU_CLASS, $selector, false);
        $attrs = array_merge($attrs, $this->crack(self::SLU_ATTR, $selector, false));
        // $attrs['classes'] = $classes;
        return compact('tag', 'classes', 'attrs');
    }

    /**
     *
     *  @param  $unit   A selector unit in sequence which being extracted
     */
    private function crack(string $unit, string &$selector, bool $unique = true)
    {
        $func = 'preg_match' . ($unique ? '' : '_all');
        $matches = [];
        $success = $func(Navel::$selector_patterns[$unit], $selector, $matches);
        if (!$success) {
            return $unique ? null : [];
        }
        // sweep
        // $selector = str_replace($matches[0], '', $selector);
        // plastic and fin
        $substance = $matches[1];
        if ($unit == self::SLU_ATTR) {
            $this->plasticAttrs($substance);
        }
        return $substance;
    }

    /**
     *
     */
    private function plasticAttrs(array &$attrs): void
    {
        $rare_attrs = $attrs;
        $attrs = [];
        foreach ($rare_attrs as $r_attr) {
            $chopped = explode('=', $r_attr, 2);
            $attrs[$chopped[0]] = $chopped[1] ?? '';
        }
    }

    /**
     *
     */

    /**
     *
     */

//[EOAC]*/
}