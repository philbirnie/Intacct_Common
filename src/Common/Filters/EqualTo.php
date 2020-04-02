<?php
/**
 * EqualTo Filter
 *
 * @package    Intacct_Custmer_List
 * @subpackage Customer_list
 * @since      2020 Mar
 */

namespace Intacct\Common\Filters;

use Intacct\Functions\Common\GetList\FilterInterface;
use Intacct\Xml\XMLWriter;

class EqualTo implements FilterInterface
{

    /** @var string Field to Query. */
    protected $field = '';

    /** @var string */
    protected $value = '';

    /**
     * In constructor.
     *
     * @param string $field Field.
     * @param string $value Value.
     */
    public function __construct(string $field, string $value)
    {
        $this->field = $field;
        $this->value = $value;
    }


    /**
     * Output XML.
     *
     * @param XMLWriter $xml
     */
    public function writeXml(XMLWriter &$xml)
    {
        if ($this->field && $this->value) {
            $xml->startElement('equalto');
            $xml->writeElement('field', $this->field);
            $xml->writeElement('value', $this->value);
            $xml->endElement(); //End equalto
        }
    }
}
