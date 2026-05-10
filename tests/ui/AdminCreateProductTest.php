<?php

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;

class AdminCreateProductTest extends TestCase
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

    public function testAdminCreateProduct()
    {
        // =====================
        // LOGIN
        // =====================
        $this->driver->get('http://localhost:8081/login');

        sleep(3);

        $this->driver->findElement(
            WebDriverBy::name('username')
        )->sendKeys('admin');

        $this->driver->findElement(
            WebDriverBy::name('password')
        )->sendKeys('1234');

        // tombol login
        $buttons = $this->driver->findElements(
            WebDriverBy::tagName('button')
        );

        $buttons[0]->click();

        sleep(3);

        // =====================
        // HALAMAN CREATE
        // =====================
        $this->driver->get(
            'http://localhost:8081/admin/products/create'
        );

        sleep(3);

        // =====================
        // ISI FORM
        // =====================

        $this->driver->findElement(
            WebDriverBy::name('name')
        )->sendKeys('Hirono Blind Box');

        $this->driver->findElement(
            WebDriverBy::name('price')
        )->sendKeys('250000');

        $this->driver->findElement(
            WebDriverBy::name('description')
        )->sendKeys('Produk testing selenium');

        // pilih category
        $this->driver->findElement(
            WebDriverBy::name('category_id')
        )->sendKeys('Action Figure');

        // upload gambar
        $imageInput = $this->driver->findElement(
            WebDriverBy::name('image')
        );

        $imageInput->sendKeys(
            'C:\xampp82\htdocs\toyshop\public\image\hirono.jpg'
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
        // SUBMIT FORM
        // =====================

        $submit = $this->driver->findElement(
            WebDriverBy::xpath("//button[contains(text(),'Simpan')]")
        );

        $this->driver->executeScript(
            "arguments[0].scrollIntoView(true);",
            [$submit]
        );

        sleep(2);

        $submit->click();

        // tunggu redirect
        sleep(2);

        // =====================
        // SCROLL LAGI SETELAH SUBMIT
        // =====================

        $this->driver->executeScript(
            "window.scrollTo(0, document.body.scrollHeight);"
        );

        sleep(3);

        // =====================
        // ASSERT
        // =====================

        // cek redirect ke dashboard admin
        $currentUrl = $this->driver->getCurrentURL();

        $this->assertStringContainsString(
            '/admin/products',
            $currentUrl
        );

        // cek produk tampil di halaman
        $pageSource = $this->driver->getPageSource();

        $this->assertStringContainsString(
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