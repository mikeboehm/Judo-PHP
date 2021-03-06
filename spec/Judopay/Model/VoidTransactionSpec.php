<?php

namespace spec\Judopay\Model;

use Tests\Builders\VoidTransactionBuilder;

class VoidTransactionSpec extends ModelObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Judopay\Model\VoidTransaction');
    }

    public function it_should_create_a_new_refund()
    {
        $this->beConstructedWith(
            $this->concoctRequest('transactions/voidtransaction.json')
        );

        $modelBuilder = new VoidTransactionBuilder();
        /** @var \Judopay\Model\VoidTransaction|VoidTransactionSpec $this */
        $this->setAttributeValues(
            $modelBuilder->compile()->getAttributeValues()
        );
        $output = $this->create();

        $output->shouldBeArray();
        $output['result']->shouldEqual('Success');
        $output['type']->shouldEqual('VOID');
        $output['originalReceiptId']->shouldEqual('12345');
        $output['originalReceiptId']->shouldEqual('12345');
        $output['originalAmount']->shouldEqual('1.02');
    }
}
