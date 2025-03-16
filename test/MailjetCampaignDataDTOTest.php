<?php

namespace Mailjet\Model;

use PHPUnit\Framework\TestCase;

class MailjetCampaignDataDTOTest extends TestCase
{
    public function testToArray()
    {
        $dto = new MailjetCampaignDataDTO(
            'fraction', 'fractionName', 'testing', 1, 'editMode', true, true,
            'reply@example.com', 'Sender Name', 123, 'Title', 456, 789,
            '2023-01-01', '2023-01-02', 101, 'en', '2023-01-03', 'preset',
            202, 'Sender', 'sender@example.com', 1, 'Subject', 'http://example.com', true
        );

        $expectedArray = [
            'AXFraction' => 'fraction',
            'AXFractionName' => 'fractionName',
            'AXTesting' => 'testing',
            'Current' => 1,
            'EditMode' => 'editMode',
            'IsStarred' => true,
            'IsTextPartIncluded' => true,
            'ReplyEmail' => 'reply@example.com',
            'SenderName' => 'Sender Name',
            'TemplateID' => 123,
            'Title' => 'Title',
            'CampaignID' => 456,
            'ContactsListID' => 789,
            'CreatedAt' => '2023-01-01',
            'DeliveredAt' => '2023-01-02',
            'ID' => 101,
            'Locale' => 'en',
            'ModifiedAt' => '2023-01-03',
            'Preset' => 'preset',
            'SegmentationID' => 202,
            'Sender' => 'Sender',
            'SenderEmail' => 'sender@example.com',
            'Status' => 1,
            'Subject' => 'Subject',
            'Url' => 'http://example.com',
            'Used' => true,
        ];

        $this->assertEquals($expectedArray, $dto->toArray());
    }

    public function testFromArray()
    {
        $data = [
            'AXFraction' => 'fraction',
            'AXFractionName' => 'fractionName',
            'AXTesting' => 'testing',
            'Current' => 1,
            'EditMode' => 'editMode',
            'IsStarred' => true,
            'IsTextPartIncluded' => true,
            'ReplyEmail' => 'reply@example.com',
            'SenderName' => 'Sender Name',
            'TemplateID' => 123,
            'Title' => 'Title',
            'CampaignID' => 456,
            'ContactsListID' => 789,
            'CreatedAt' => '2023-01-01',
            'DeliveredAt' => '2023-01-02',
            'ID' => 101,
            'Locale' => 'en',
            'ModifiedAt' => '2023-01-03',
            'Preset' => 'preset',
            'SegmentationID' => 202,
            'Sender' => 'Sender',
            'SenderEmail' => 'sender@example.com',
            'Status' => 1,
            'Subject' => 'Subject',
            'Url' => 'http://example.com',
            'Used' => true,
        ];

        $dto = MailjetCampaignDataDTO::fromArray($data);

        $this->assertInstanceOf(MailjetCampaignDataDTO::class, $dto);
        $this->assertEquals('fraction', $dto->getAxFraction());
        $this->assertEquals('fractionName', $dto->getAxFractionName());
        $this->assertEquals('testing', $dto->getAxTesting());
        $this->assertEquals(1, $dto->getCurrent());
        $this->assertEquals('editMode', $dto->getEditMode());
        $this->assertTrue($dto->isStarred());
        $this->assertTrue($dto->isTextPartIncluded());
        $this->assertEquals('reply@example.com', $dto->getReplyEmail());
        $this->assertEquals('Sender Name', $dto->getSenderName());
        $this->assertEquals(123, $dto->getTemplateID());
        $this->assertEquals('Title', $dto->getTitle());
        $this->assertEquals(456, $dto->getCampaignID());
        $this->assertEquals(789, $dto->getContactsListID());
        $this->assertEquals('2023-01-01', $dto->getCreatedAt());
        $this->assertEquals('2023-01-02', $dto->getDeliveredAt());
        $this->assertEquals(101, $dto->getId());
        $this->assertEquals('en', $dto->getLocale());
        $this->assertEquals('2023-01-03', $dto->getModifiedAt());
        $this->assertEquals('preset', $dto->getPreset());
        $this->assertEquals(202, $dto->getSegmentationID());
        $this->assertEquals('Sender', $dto->getSender());
        $this->assertEquals('sender@example.com', $dto->getSenderEmail());
        $this->assertEquals(1, $dto->getStatus());
        $this->assertEquals('Subject', $dto->getSubject());
        $this->assertEquals('http://example.com', $dto->getUrl());
        $this->assertTrue($dto->isUsed());
    }
}
