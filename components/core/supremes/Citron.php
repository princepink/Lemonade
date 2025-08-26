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
abstract class Citron extends \ArrayObject implements PQueue, Generable
{

    // Mixins

    /**
     *
     */
    use Citric, Genic;

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
    public Cidre $attribution;

    /**
     *
     *
    public int $mode_flag = self::ARRAY_AS_CONTENT;

    // Constructor

    /**
     *  A standard construction
     */
    public function __construct(mixed $contents = [], string $tag = self::DEFTAG, array|string $classes = [], array $attrs = [], public int $mode_flag = self::ARRAY_AS_CONTENT)
    {
        $this->assign();
        $this->assignTag($tag);
        // $this->assignAttrs($attrs, $classes);
        $this->attr($attrs);
        $this->addClass($classes);
        $this->fairContents($contents);
        parent::__construct($contents);
    }

    // Methods

    /**
     *
     */
    private function assign()
    {
        static $i = 0;
        $this->index = $i;
        $this->attribution = new Cidre($i);
        $this->attr('data-lmntid', "pq-$i");
        self::$elements[$i++] = $this;
    }

    /**
     *
     *  @abstracted ArrayObject
     *  @see    https://www.php.net/manual/en/arrayobject.offsetset.php
     */
    public function offsetSet(mixed $key, mixed $value): void
    {
        if (!$key && !$value) {
            return;
        }
        if (!$key && is_array($value)) {
            foreach ($value as $subkey => $subval) {
                if (is_int($subkey)) {
                    $this[] = $subval;
                } else {
                    $this[$subkey] = $subval;
                }
            }
            return;
        }
        $this->fairContent($value);
        parent::{__FUNCTION__}($key, $value);
    }

    /**
     *
     */

    /**
     *
     */

    /**
     *
     */

    /**
     *
     */

    /**
     *
     */

    /**
     *
     */

//[EOAC]*/
}
