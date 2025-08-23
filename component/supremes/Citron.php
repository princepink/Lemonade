<?php
namespace Pearlpuppy\Lemonade;

/**
 *  @file   Citron
 *  @package    Lemonade
 *  @since  2016-12-01
 *  @update 2025-
 */

/**
 *
 */
abstract class Citron extends \ArrayObject implements PQueue
{

    // Mixins

    /**
     *
     */
    use Citric;

    // Constants

    /**
     *
     *
    public const DEFTAG = 'span';

    // Properties

    /**
     *
     */
    public static $elements = [];

    /**
     *
     */
    public $index;

    /**
     *
     */
    public string $tag;

    /**
     *
     */
    public array $attributes;

    // Constructor

    /**
     *  A standard construction
     */
    public function __construct(array|string|PQueue $contents = [], string $tag = self::DEFTAG, array|string $classes = [], array $attrs = [])
    {
        $this->assignTag($tag);
        // $this->assignAttrs($attrs, $classes);
        $this->attr($attrs);
        $this->addClass($classes);
        $this->fairContents($contents);
        parent::__construct($contents);
        $this->assign();
    }

    // Methods

    /**
     *
     */
    public function getGenerator(): \Generator
    {
        yield from $this;
    }

    /**
     *
     */
    private function assign()
    {
        static $i = 0;
        $this->index = $i;
        $this->attr('data-lmntid', "pq-$i");
        self::$elements[$i++] = $this;
    }

    /**
     *
     */

//[EOAC]*/
}
