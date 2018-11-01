<?php

namespace spec\Judopay\Model;

use Judopay\Model\TokenPayment;
use Tests\Builders\TokenPaymentBuilder;

class TokenPaymentSpec extends ModelObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Judopay\Model\TokenPayment');
    }

    public function it_should_create_a_new_payment()
    {
        $this->beConstructedWith(
            $this->concoctRequest('card_payments/create.json')
        );

        $modelBuilder = new TokenPaymentBuilder();
        /** @var TokenPayment|TokenPaymentSpec $this */
        $this->setAttributeValues(
            $modelBuilder->compile()->getAttributeValues()
        );
        $output = $this->create();

        $output->shouldBeArray();
        $output['results']->shouldEqual('Success');
    }
}
