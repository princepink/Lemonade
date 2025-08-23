<?php
namespace Pearlpuppy\Lemonade;

/**
 *  @file   Orange
 *  @package    Lemonade
 *  @since  2025-08-19 (ver. 0.3.0)
 *  @update 2025-
 */

/**
 *  A tester of instance
 */
class Orange extends Citron
{

	// Mixins

    /**
     *
     */

    // Constants

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
    public function __construct(string $tag = parent::DEFTAG)
    {
        parent::__construct(tag: $tag);
    }

    /**
     *    @param    $selector    (string)    CSS selector
     *
    public function __construct(?string $selector = null, mixed $contents = array())
    {
        if ($selector) {
            $this->cracker($selector);
        }
        $this->gratify($contents);
        $this->listen();

        // parent::__construct($contents, $tag, $classes, $attrs);

        // $this->tag = $this->clean_tag($tag);
        // $this->attributes = $this->clean_attrs($classes, $attrs);
        // $this->content = $this->cleanContent($contents);

    }

    // Methods

    /**
     *
     *
    public function gratify($contents = null, $overwrite = false)
    {
        if (!$contents && !$overwrite) {
            return $this->container;
        }
        if (!is_array($contents)) {
            $contents = [$contents];
        }
        if ($overwrite) {
            $this->container = $contents;
            return;
        }
        $this->container = array_merge($this->container, $contents);
        return;
    }

    /**
     *
     *
    public function impose(): string
    {
        $this->universal_injection();
        // $nl = self::$line_breaker;
        if ($this->is_empty_element()) {
            $format = self::$emp_format;
        } else {
            $format = self::$ht_format;
        }
        // if (!($this->is_inline_element() && is_string($this->content))) {
        if (!$this->is_inline_element()) {
            $format = PHP_EOL . $format . PHP_EOL;
        }
        $values = array(
            $this->tag,
            $this->tribal(),
        );
        if (!$this->is_empty_element()) {
            $values[2] = $this->innerInpose();
        }
        $markup = vsprintf($format, $values);
        return str_replace(PHP_EOL . PHP_EOL, PHP_EOL, $markup);
    }

    /**
     *
     *
    private function innerInpose()
    {
        if ($this->content instanceof PQueue) {
            $inner = $this->content->impose();
        } elseif (is_iterable($this->content)) {
            $inner = '';
            foreach ($this->content as $content) {
                $inner .= $content instanceof PQueue ? $content->impose() : $content;
            }
        } else {
            $inner = $this->content;
        }
        return $inner;
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

//[EOC]*/
}
