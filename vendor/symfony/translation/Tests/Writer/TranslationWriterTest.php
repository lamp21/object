<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Tests\Writer;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Translation\Dumper\DumperInterface;
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\Writer\TranslationWriter;

class TranslationWriterTest extends TestCase
{
<<<<<<< HEAD
    /**
     * @group legacy
     * @expectedDeprecation The "Symfony\Component\Translation\Writer\TranslationWriter::writeTranslations()" method is deprecated since Symfony 3.4 and will be removed in 4.0. Use write() instead.
     */
    public function testWriteTranslations()
    {
        $dumper = $this->getMockBuilder('Symfony\Component\Translation\Dumper\DumperInterface')->getMock();
        $dumper
            ->expects($this->once())
            ->method('dump');

        $writer = new TranslationWriter();
        $writer->addDumper('test', $dumper);
        $writer->writeTranslations(new MessageCatalogue('en'), 'test');
    }

    public function testWrite()
=======
    public function testWriteTranslations()
>>>>>>> origin/changgao
    {
        $dumper = $this->getMockBuilder('Symfony\Component\Translation\Dumper\DumperInterface')->getMock();
        $dumper
            ->expects($this->once())
            ->method('dump');

        $writer = new TranslationWriter();
        $writer->addDumper('test', $dumper);
<<<<<<< HEAD
        $writer->write(new MessageCatalogue([]), 'test');
=======
        $writer->writeTranslations(new MessageCatalogue(array()), 'test');
>>>>>>> origin/changgao
    }

    public function testDisableBackup()
    {
        $nonBackupDumper = new NonBackupDumper();
        $backupDumper = new BackupDumper();

        $writer = new TranslationWriter();
        $writer->addDumper('non_backup', $nonBackupDumper);
        $writer->addDumper('backup', $backupDumper);
        $writer->disableBackup();

        $this->assertFalse($backupDumper->backup, 'backup can be disabled if setBackup() method does exist');
    }
}

class NonBackupDumper implements DumperInterface
{
    public function dump(MessageCatalogue $messages, $options = array())
    {
    }
}

class BackupDumper implements DumperInterface
{
    public $backup = true;

    public function dump(MessageCatalogue $messages, $options = array())
    {
    }

    public function setBackup($backup)
    {
        $this->backup = $backup;
    }
}
