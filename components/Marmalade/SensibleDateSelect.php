<?php
namespace Pearlpuppy\Lemonade\Marmalade;

/**
 *  @file   SensibleDateSelect
 *  @package    Lemonade
 *  @subpackage Marmalade
 *  @since  2025-08-24 (ver. 0.3.1)
 *  @update 2025-
 */

use Pearlpuppy\Lemonade\ {
    Cascabela,
    Lime,
    PQueue,
};

/**
 *
 */
class SensibleDateSelect extends Cascabela
{

	// Mixins

    /**
     *
     */

    // Constants

    /**
     *
     */
    protected const LMNT = 'fieldset';
    protected const ID = 'lmnt-dateselect';

    // Properties

    /**
     *
     */
    protected static $default_args = array(
        '_root_tag' => self::LMNT,       // stable
        'root_id' => self::ID,
        'use_legend' => true,
        'legend' => 'Select your special date.',
        'duration' => 25,
        'date_name' => 'selected_date',
    );

    // Constructor

    /**
     *
     */
    public function __construct(public array $args)
    {
        $selector = self::LMNT . '#' . $this->arg('root_id');
        $contents = $this->build();
        parent::{__FUNCTION__}($selector, $contents);
    }

    // Methods

    /**
     *
     */
    protected function build(): array
    {
        $contents = [];
        foreach ($this->genContents() as $suf => $tag) {
            $id = $this->arg('root_id') . "-$suf";
            $method = 'build' . ucfirst($suf);
            $object = new Lime("$tag#$id");
            if ($tag == 'select') {
                $oplab = ucfirst($suf);
                $object[] = new Lime('option[value]', "- $oplab -");
            }
            $this->{$method}($object);
            $contents[$suf] = $object;
            $object->index = $suf;
        }
        return $contents;



        // $legend = new Lime('legend', $this->arg('legend'));
        // $hidden = new Lime('input#selected-date[type=hidden][name=' . $this->arg('date_name') . ']');
        // $select_d = new Lime('select#day');
        // $select_m = new Lime('select#month');
        // $select_y = new Lime('select#year');
        // return compact('legend', 'hidden', 'select_d', 'select_m', 'select_y');
    }

    /**
     *
     */
    protected function arg(string $key): mixed
    {
        static $args;
        if (!isset($args)) {
            $args = array_merge(self::$default_args, $this->args);
        }
        return $args[$key];
    }

    /**
     *
     */
    protected function genContents()
    {
        // id_suffix => tag
        if ($this->arg('use_legend')) {
            yield 'legend' => 'legend';
        }
        yield 'date' => 'input';
        yield 'day' => 'select';
        yield 'month' => 'select';
        yield 'year' => 'select';
    }

    /**
     *
     */
    protected function buildLegend(PQueue $object)
    {
        $object[] = $this->arg('legend');
    }

    /**
     *
     */
    protected function buildDate(PQueue $object)
    {
        $object->attr('type', 'hidden');
    }

    /**
     *
     */
    protected function buildDay(PQueue $object)
    {
        // $object[] = new Lime('option[value]', ucfirst($suffix));
        for ($d = 1; $d <= 31; $d++) {
            $opt = new Lime("option[value=$d]", $d);
            $object[] = $opt;
        }
    }

    /**
     *
     */
    protected function buildMonth(PQueue $object)
    {
        // $object[] = new Lime('option[value]', ucfirst($suffix));
        $dt = new \DateTime('today');
        $period = new \DateInterval('P1M');
        $dt->modify('first day of january');
        for ($y = $dt->format('Y'); $dt->format('Y') == $y; $dt->add($period)) {
            $m = $dt->format('m');
            $opt = new Lime("option[value=$m]", $dt->format('F'));
            $opt->attr('lmnt-totaldays', $dt->format('t'));
            $object[] = $opt;
        }
    }

    /**
     *
     */
    protected function buildYear(PQueue $object)
    {
        // $object[] = new Lime('option[value]', ucfirst($suffix));
        $dt = new \DateTime('today');
        $dur = $this->arg('duration');
        $y = (int) $dt->format('Y');
        for ($sy = $y - floor($dur / 2); $sy < $y + ceil($dur / 2); $sy++) {
            $opt = new Lime("option[value=$sy]", $sy);
            $object[] = $opt;
            if ($sy == $y) {
                $opt->attr('selected', '');
            }
        }
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
