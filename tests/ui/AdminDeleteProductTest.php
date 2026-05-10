<?php

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;

class AdminDeleteProductTest extends TestCase
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

    public function testAdminDeleteProduct()
    {
        // =====================
        // LOGIN ADMIN
        // =====================

        $this->driver->get('http://localhost:8081/login');

        sleep(3);

        $this->driver->findElement(
            WebDriverBy::name('username')
        )->sendKeys('admin');

        $this->driver->findElement(
            WebDriverBy::name('password')
        )->sendKeys('1234');

        $loginButton = $this->driver->findElements(
            WebDriverBy::tagName('button')
        );

        $loginButton[0]->click();

        sleep(4);

        // =====================
        // HALAMAN ADMIN PRODUCTS
        // =====================

        $this->driver->get(
            'http://localhost:8081/admin/products'
        );

        sleep(3);

        // =====================
        // SCROLL KE BAWAH
        // =====================

        $this->driver->executeScript(
            "window.scrollTo(0, document.body.scrollHeight);"
        );

        sleep(2);

        // =====================
        // CARI CARD HIRONO
        // =====================

        $hironoCard = $this->driver->findElement(
            WebDriverBy::xpath(
                "//*[contains(text(),'Hirono Blind Box')]/ancestor::div[contains(@class,'card')]"
            )
        );      

        sleep(2);

        // scroll ke card
        $this->driver->executeScript(
            "arguments[0].scrollIntoView(true);",
            [$hironoCard]
        );

        sleep(2);

        // cari tombol delete di card tersebut
        $deleteButton = $hironoCard->findElement(
            WebDriverBy::xpath(
                ".//a[contains(text(),'Delete')]"
            )
        );

        sleep(2);

        // klik delete pakai javascript
        $this->driver->executeScript(
            "arguments[0].click();",
            [$deleteButton]
        );

        sleep(2);

        // =====================
        // HANDLE ALERT DELETE
        // =====================

        $alert = $this->driver->switchTo()->alert();

        $alert->accept();

        sleep(5);

        // =====================
        // SCROLL KE BAWAH SETELAH DELETE
        // =====================

        $this->driver->executeScript(
            "window.scrollTo(0, document.body.scrollHeight);"
        );

        sleep(5);

        // =====================
        // ASSERT
        // =====================

        $currentUrl = $this->driver->getCurrentURL();

        $this->assertStringContainsString(
            '/admin/products',
            $currentUrl
        );

        // pastikan produk sudah hilang
        $pageSource = $this->driver->getPageSource();

        $this->assertStringNotContainsString(
            'Hirono Blind Box',
            $pageSource
        );
    }

    protected function tearDown(): void
    {
        if ($this->driver) {
            try {
                $this->driver->quit();
            } catch (\Exception $e) {
            }
        }
    }
}