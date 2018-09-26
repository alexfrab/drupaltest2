<?php

namespace Drupal\Tests\field_example\Functional;

/**
 * Test base scritto da Alessio 
 *
 *
 * @group field_example
 * @group examples
 *
 * @ingroup field_example
 */
class AlessioTest extends TestCase {

  /**
   * Test di base molto semplice.
   *
   */
  public function testNumeroUno() {
    //$assert = $this->assertSession();

    $this->assertEquals(1, 1);
    
  }

}
