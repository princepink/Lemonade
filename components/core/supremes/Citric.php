<?php
namespace Pearlpuppy\Lemonade;

/**
 *  @file   Citric
 *  @package    Lemonade
 *  @since  2016-12-01
 *  @update 2025-
 *
 *  f.k.a. Citrine
 */

/**
 *  
 */
trait Citric
{

    // Mixins

    /**
     *
     *
    use CitricIn, CitricOn, CitricOut;

    // Constants

    /**
     *
     */
    public const DEFTAG = 'span';

    /**
     *
     */
    public const PAT_ALPH_FIRST = "/^[a-zA-Z]/";

    /**
     *
     */
    public const FLAG_GET = '%__GET__%';

    /**
     *
     */

    // Properties

    /**
     *
     */

    // Constructor

    /**
     *
     */

    // Methods

    /**
     *
     */
    protected function assignTag(string $tag): void
    {
        $this->tag = $tag ? $tag : self::DEFTAG;
    }

    /**
     *
     */
    protected function fairClasses(&$classes): void
    {
        $classes = preg_grep(self::PAT_ALPH_FIRST, $classes);
    }

    /**
     *
     */
    protected function fairContents(&$contents): void
    {
        if (!is_array($contents)) {
            $contents = [$contents];
        }
    }

    /**
     *
     */
    protected function fairContent(&$content): void
    {
        if (!array_key_exists($this->tag, Navel::$ruled_desc)) {
            return;
        }
        $limits = Navel::$ruled_desc[$this->tag];
        if ($content instanceof PQueue) {
            if (is_array($limits)) {
                if (in_array($content->tag, $limits)) {
                    return;
                }
            } elseif ($content->tag == $limits) {
                return;
            }
        }
        $sub_tag = is_array($limits) ? $limits['@'] : $limits;
        $content = new Lime($sub_tag, $content);
        $content->attr('data-lmntcreate', __FUNCTION__);
    }

    /**
     *
     */
    public function addClass(string|array|callable $val_or_func): void
    {
        // map
        if (is_array($val_or_func)) {
            foreach ($val_or_func as $class) {
                $this->addClass($class);
            }
            return;
        // filter
        } elseif (is_callable($val_or_func)) {
            $this->addClass(call_user_func($val_or_func, $this->index, $this->attribution['classes']));
            return;
        }
        // set
        $this->attribution['classes'][] = $val_or_func;
        // final clean
        $this->attribution['classes'] = array_unique($this->attribution['classes']);
        $this->fairClasses($this->attribution['classes']);
        return;
    }

    /**
     *
     *  @param  $value  CAUTION! if passed null, this method unset $name attribute
     *      To set the name-only attribute, pass empty string or exactly same string as $name
     *      This behavior is derived from jQuery
     */
    public function attr(string|array $name_or_map, mixed $val_or_func = self::FLAG_GET): mixed
    {
        // map
        if (is_array($name_or_map)) {
            foreach ($name_or_map as $subname => $subval) {
                $this->attr($subname, $subval);
            }
            // $this->attribution = array_merge($this->attribution, $name_or_map);
            return true;
        // validate
        } elseif (!preg_match(Navel::PAT_ATTRNAME, $name_or_map)) {
            return false;
        // rename
        } elseif ($name_or_map == 'class') {
            $name_or_map .= 'es';
        // provide value
        } elseif ($val_or_func == self::FLAG_GET) {
            return $this->attribution[$name_or_map] ?? false;
        }
        // del
        if (is_null($val_or_func)) {
            unset($this->attribution[$name_or_map]);
            return true;
        }
        // filter
        if (is_callable($val_or_func)) {
            $existval = $this->attribution[$name_or_map] ?? null;
            $res = call_user_func($val_or_func, $this->index, $existval);
            if (is_callable($res)) {       // prevent infinite loop
                return false;
            }
            $this->attr($name_or_map, $res);
            return true;
        }
        // class
        if ($name_or_map == 'classes') {
            $this->addClass($val_or_func);
            return true;
        }
        // set
        $this->attribution[$name_or_map] = $val_or_func;
        return true;
    }

    /**
     *
     */
    public function hasAttr(string $name): bool
    {
        return $this->attribution->offsetExists($name);
        // return array_key_exists($name, $this->attribution);
    }

    /**
     *
     *  @abstracted PQueue
     */
    public function impose(): string
    {
        // finetune
        $this->universalInjection();
        // define format and values to express
        $is_emp = Navel::isEmptyLmnt($this);
        $format = $is_emp ? Navel::FORMAT_EMP : $format = Navel::FORMAT_LMNT;
        $this->fineFormat($format);
        $values = array(
            $this->tag,
            $this->tribal(),
            // Navel::tribe($this->attribution),
        );
        if (!$is_emp) {
            $content = '';
            foreach ($this->getGenerator() as $subcont) {
                $this->innerImpose($content, $subcont);
            }
            $values[] = $content;
        }
        // markup
        $markup = vsprintf($format, $values);
        // clean and fin
        return str_replace(PHP_EOL . PHP_EOL, PHP_EOL, $markup);
    }

    /**
     *
     *  @abstracted PQueue
     */
    public function expose(): void
    {
        echo $this->impose();
    }

    /**
     *
     */
    private function innerImpose(string &$content, mixed $subcont): void
    {
        if (is_array($subcont)) {
            foreach ($subcont as $deep) {
                $this->innerImpose($content, $deep);
            }
        } elseif ($subcont instanceof PQueue) {
            $content .= $subcont->impose();
        } else {
            $content .= $subcont;
        }
    }

    /**
     *
     */
    private function universalInjection(): void
    {
        if (Navel::isFormCntl($this) && !$this->hasAttr('tabindex')) {
            if ($this->hasAttr('type') && $this->attr('type') == 'hidden') {
                return;
            }
            $this->attr('tabindex', 0);
        }
    }

    /**
     *
     */
    private function fineFormat(string &$format)
    {
        if (Navel::isInlineLmnt($this) && $this->count() === 1 && is_string($this[0])) {
            return;
        }
        $format = PHP_EOL . $format . PHP_EOL;
    }

    /**
     *
     */
    private function tribal()
    {
        $attr = '';
        foreach ($this->attribution as $key => $val) {
            if ($key == 'classes') {
                $key = substr($key, 0, -2);
            }
            if (is_array($val)) {
                $val = array_unique($val);
                if (!empty($val)) {
                    $val = array_diff($val, ['']);
                    $val = implode(' ', $val);
                } else {
                    unset($val);
                }
            } elseif (is_string($val)) {
                if (empty($val)) {
                    unset($val);
                }
            }
            if (isset($val)) {
                $attr .= " {$key}=\"{$val}\"";
            } else {
                $attr .= " $key";
            }
        }
        return $attr;
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

//[EOT]*/
}
