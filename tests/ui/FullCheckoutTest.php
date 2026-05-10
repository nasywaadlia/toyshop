<?php

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;

class FullCheckoutTest extends TestCase
{
    protected $driver;

    protected function setUp(): void
    {
        $host = 'http://localhost:58121';

        $capabilities = DesiredCapabilities::chrome();

        $capabilities->setCapability(
            'ms:edgeOptions',
            [
                'binary' => 'C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe'
            ]
        );

        $this->driver = RemoteWebDriver::create(
            $host,
            $capabilities
        );
    }

    public function testFullCheckoutFlow()
    {
        // buka homepage
        $this->driver->get('http://localhost:8081');

        sleep(2);

        // klik tombol beli pertama
        $buyButton = $this->driver->findElement(
            WebDriverBy::xpath('(//button[contains(text(),"Beli")])[1]')
        );

        // scroll ke tombol dulu
        $this->driver->executeScript(
            "arguments[0].scrollIntoView(true);",
            [$buyButton]
        );

        sleep(1);

        // klik pakai javascript
        $this->driver->executeScript(
            "arguments[0].click();",
            [$buyButton]
        );

        sleep(2);

        // buka cart
        $this->driver->get('http://localhost:8081/cart');

        sleep(2);

        // buka checkout
        $this->driver->get('http://localhost:8081/checkout');

        sleep(2);

        // isi form checkout
        $this->driver->findElement(WebDriverBy::name('nama'))
            ->sendKeys('Saskia');

        $this->driver->findElement(WebDriverBy::name('email'))
            ->sendKeys('saskia@mail.com');

        $this->driver->findElement(WebDriverBy::name('no_hp'))
            ->sendKeys('08123456789');

        $this->driver->findElement(WebDriverBy::name('alamat'))
            ->sendKeys('Jakarta');

        sleep(1);

        // submit checkout
        $submitButton = $this->driver->findElement(
            WebDriverBy::xpath('//button[contains(text(),"Simpan Pesanan")]')
        );

        $this->driver->executeScript(
            "arguments[0].scrollIntoView(true);",
            [$submitButton]
        );

        sleep(1);

        $this->driver->executeScript(
            "arguments[0].click();",
            [$submitButton]
        );

        sleep(3);

        // cek halaman kembali ke home
        $this->assertStringContainsString(
            '/',
            parse_url($this->driver->getCurrentURL(), PHP_URL_PATH)
        );
    }

    protected function tearDown(): void
    {
        $this->driver->quit();
    }
}