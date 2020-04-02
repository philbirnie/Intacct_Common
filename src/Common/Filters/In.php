<?php
/**
 * In Filter
 *
 * @package    Intacct_Custmer_List
 * @subpackage Customer_list
 * @since      2020 Mar
 */

namespace Intacct\CommonFilters\Filters;

use Intacct\Functions\Common\GetList\FilterInterface;
use Intacct\Xml\XMLWriter;

class In implements FilterInterface
{

    /** @var string Field to Query. */
    protected $field = '';

    /** @var string[] */
    protected $values = [];

    /**
     * In constructor.
     *
     * @param string $field Field.
     * @param array $values Values
     */
    public function __construct(string $field, $values = [])
    {
        $this->field = $field;
        $this->values = $values;
    }

    /**
     * Adds New Value to Query
     *
     * @param string $value
     */
    public function addValue(string $value)
    {
        $this->values[] = $value;
        $this->values = array_unique($this->values);
    }

    /**
     * Output XML.
     *
     * @param XMLWriter $xml
     */
    public function writeXml(XMLWriter &$xml)
    {
        if ($this->field && count($this->values) > 1) {
            $xml->startElement('in');
            $xml->writeElement('field', $this->field);

            foreach ($this->values as $value) {
                $xml->writeElement('value', $value);
            }

            $xml->endElement(); //End In
        }
    }
}
