<?php
namespace Pearlpuppy\Lemonade;

/**
 *  @file   Cidre
 *  @package    Lemonade
 *  @since  2025-08-23 (ver. 0.3.1)
 *  @update 2025-
 */

use Pearlpuppy\Tailor;

/**
 *
 */
class Cidre extends \ArrayObject implements Tailor\Generable
{

	// Mixins

    /**
     *
     */
    use Tailor\Genic;

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
    public function __construct(public int|string $lmnt_index, array $attrs = [])
    {
        parent::{__FUNCTION__}($attrs);
    }

    // Methods

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

//[EOC]*/
}