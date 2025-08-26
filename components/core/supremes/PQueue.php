<?php
namespace Pearlpuppy\Lemonade;

/**
 *  @file   PQueue
 *  @package    Lemonade
 *  @since  2016-12-01 (ver. 0.0.0)
 *  @update 2025-
 */

/**
 *  Grand design of 'Lemon' object
 */
interface PQueue
{

    // Methods

    /**
     *  -------------------------------
     *  Output
     *  -------------------------------
     */

    /**
     *  Creates outputting HTML markup
     */
    public function impose(): string;

    /**
     *  Outputs HTML markup
     */
    public function expose(): void;

    /**
     *  -------------------------------
     *  Edit
     *  -------------------------------
     */

    /**
     *
     *
    public function verify($tag);

    /**
     *  Operates contents
     */
    public function gratify(iterable $contents, int $mode_flag): void;

    /**
     *
     *
    public function specify(array $attrs);
    public function identify($id);
    public function classify($classes, $overwrite);
    public function declassify($value);

    /**
     *  -------------------------------
     *  Inspired by jQuery
     *  -------------------------------
     */

    /**
     *
     *  @see    https://api.jquery.com/addClass/
     */
    public function addClass(string|array|callable $val_or_func): void;

    /**
     *
     *  @see    https://api.jquery.com/attr/
     */
    public function attr(string|array $name_or_map, mixed $val_or_func): mixed;

    /**
     *
     *
    public function hasClass();

    /**
     *
     *
    public function prop();

    /**
     *
     *
    public function removeAttr();

    /**
     *
     *
    public function removeClass();

    /**
     *
     *
    public function removeProp();

    /**
     *
     *
    public function toggleClass();

    /**
     *
     *
    public function val();

    /**
     *
     */

    /**
     *  -------------------------------
     *  From other DOM operation languages
     *      (not exactly same name or behavior)
     *  -------------------------------
     */

    /**
     *
     *  @see    https://developer.mozilla.org/en-US/docs/Web/API/Element/hasAttribute
     */
    public function hasAttr(string $name): bool;

    /**
     *  -------------------------------
     *
     *  -------------------------------
     */

    /**
     *  -------------------------------
     *  -------------------------------
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

//[EOI]*/
}