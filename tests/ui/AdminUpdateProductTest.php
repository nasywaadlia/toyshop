<?php

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;

class AdminUpdateProductTest extends TestCase
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

    public function testAdminUpdateProduct()
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
        // AMBIL TOMBOL EDIT PERTAMA
        // =====================

        $editButton = $this->driver->findElement(
            WebDriverBy::xpath("(//a[contains(text(),'Edit')])[1]")
        );

        // klik pakai javascript
        $this->driver->executeScript(
            "arguments[0].click();",
            [$editButton]
        );

        sleep(4);

        // =====================
        // UPDATE DATA
        // =====================

        $nameInput = $this->driver->findElement(
            WebDriverBy::name('name')
        );

        $nameInput->clear();

        sleep(1);

        $nameInput->sendKeys(
            'Jellycat Updated'
        );

        sleep(2);

        // =====================
        // SCROLL KE BAWAH
        // =====================

        $this->driver->executeScript(
            "window.scrollTo(0, document.body.scrollHeight);"
        );

        sleep(2);

        // =====================
        // KLIK BUTTON UPDATE
        // =====================

        $updateButton = $this->driver->findElement(
            WebDriverBy::xpath("//button[contains(text(),'Update')]")
        );

        // scroll ke tombol
        $this->driver->executeScript(
            "arguments[0].scrollIntoView(true);",
            [$updateButton]
        );

        sleep(2);

        // klik pakai javascript
        $this->driver->executeScript(
            "arguments[0].click();",
            [$updateButton]
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

        $pageSource = $this->driver->getPageSource();

        $this->assertStringContainsString(
            'Jellycat Updated',
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