<?php

namespace Mailjet\Model;

class MailjetCampaignDataDTO implements DtoInterface
{
    /**
     * @param string $axFraction
     * @param string $axFractionName
     * @param string $axTesting
     * @param int $current
     * @param string $editMode
     * @param bool $isStarred
     * @param bool $isTextPartIncluded
     * @param string $replyEmail
     * @param string $senderName
     * @param int $templateID
     * @param string $title
     * @param int $campaignID
     * @param int $contactsListID
     * @param string $createdAt
     * @param string $deliveredAt
     * @param int $id
     * @param string $locale
     * @param string $modifiedAt
     * @param string $preset
     * @param int $segmentationID
     * @param string $sender
     * @param string $senderEmail
     * @param int $status
     * @param string $subject
     * @param string $url
     * @param bool $used
     */
    public function __construct(
        public string $axFraction,
        public string $axFractionName,
        public string $axTesting,
        public int $current,
        public string $editMode,
        public bool $isStarred,
        public bool $isTextPartIncluded,
        public string $replyEmail,
        public string $senderName,
        public int $templateID,
        public string $title,
        public int $campaignID,
        public int $contactsListID,
        public string $createdAt,
        public string $deliveredAt,
        public int $id,
        public string $locale,
        public string $modifiedAt,
        public string $preset,
        public int $segmentationID,
        public string $sender,
        public string $senderEmail,
        public int $status,
        public string $subject,
        public string $url,
        public bool $used
    ) {
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            axFraction: $data['AXFraction'] ?? '',
            axFractionName: $data['AXFractionName'] ?? '',
            axTesting: $data['AXTesting'] ?? '',
            current: $data['Current'] ?? 0,
            editMode: $data['EditMode'] ?? '',
            isStarred: $data['IsStarred'] ?? false,
            isTextPartIncluded: $data['IsTextPartIncluded'] ?? false,
            replyEmail: $data['ReplyEmail'] ?? '',
            senderName: $data['SenderName'] ?? '',
            templateID: $data['TemplateID'] ?? 0,
            title: $data['Title'] ?? '',
            campaignID: $data['CampaignID'] ?? 0,
            contactsListID: $data['ContactsListID'] ?? 0,
            createdAt: $data['CreatedAt'] ?? '',
            deliveredAt: $data['DeliveredAt'] ?? '',
            id: $data['ID'] ?? 0,
            locale: $data['Locale'] ?? '',
            modifiedAt: $data['ModifiedAt'] ?? '',
            preset: $data['Preset'] ?? '',
            segmentationID: $data['SegmentationID'] ?? 0,
            sender: $data['Sender'] ?? '',
            senderEmail: $data['SenderEmail'] ?? '',
            status: $data['Status'] ?? 0,
            subject: $data['Subject'] ?? '',
            url: $data['Url'] ?? '',
            used: $data['Used'] ?? false
        );
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'AXFraction' => $this->getAxFraction(),
            'AXFractionName' => $this->getAxFractionName(),
            'AXTesting' => $this->getAxTesting(),
            'Current' => $this->getCurrent(),
            'EditMode' => $this->getEditMode(),
            'IsStarred' => $this->isStarred(),
            'IsTextPartIncluded' => $this->isTextPartIncluded(),
            'ReplyEmail' => $this->getReplyEmail(),
            'SenderName' => $this->getSenderName(),
            'TemplateID' => $this->getTemplateID(),
            'Title' => $this->getTitle(),
            'CampaignID' => $this->getCampaignID(),
            'ContactsListID' => $this->getContactsListID(),
            'CreatedAt' => $this->getCreatedAt(),
            'DeliveredAt' => $this->getDeliveredAt(),
            'ID' => $this->getId(),
            'Locale' => $this->getLocale(),
            'ModifiedAt' => $this->getModifiedAt(),
            'Preset' => $this->getPreset(),
            'SegmentationID' => $this->getSegmentationID(),
            'Sender' => $this->getSender(),
            'SenderEmail' => $this->getSenderEmail(),
            'Status' => $this->getStatus(),
            'Subject' => $this->getSubject(),
            'Url' => $this->getUrl(),
            'Used' => $this->isUsed(),
        ];
    }

    /**
     * @return string
     */
    public function getAxFraction(): string
    {
        return $this->axFraction;
    }

    /**
     * @param string $axFraction
     * @return void
     */
    public function setAxFraction(string $axFraction): void
    {
        $this->axFraction = $axFraction;
    }

    /**
     * @return string
     */
    public function getAxFractionName(): string
    {
        return $this->axFractionName;
    }

    /**
     * @param string $axFractionName
     * @return void
     */
    public function setAxFractionName(string $axFractionName): void
    {
        $this->axFractionName = $axFractionName;
    }

    /**
     * @return string
     */
    public function getAxTesting(): string
    {
        return $this->axTesting;
    }

    /**
     * @param string $axTesting
     * @return void
     */
    public function setAxTesting(string $axTesting): void
    {
        $this->axTesting = $axTesting;
    }

    /**
     * @return int
     */
    public function getCurrent(): int
    {
        return $this->current;
    }

    /**
     * @param int $current
     * @return void
     */
    public function setCurrent(int $current): void
    {
        $this->current = $current;
    }

    /**
     * @return string
     */
    public function getEditMode(): string
    {
        return $this->editMode;
    }

    /**
     * @param string $editMode
     * @return void
     */
    public function setEditMode(string $editMode): void
    {
        $this->editMode = $editMode;
    }

    /**
     * @return bool
     */
    public function isStarred(): bool
    {
        return $this->isStarred;
    }

    /**
     * @param bool $isStarred
     * @return void
     */
    public function setIsStarred(bool $isStarred): void
    {
        $this->isStarred = $isStarred;
    }

    /**
     * @return bool
     */
    public function isTextPartIncluded(): bool
    {
        return $this->isTextPartIncluded;
    }

    /**
     * @param bool $isTextPartIncluded
     * @return void
     */
    public function setIsTextPartIncluded(bool $isTextPartIncluded): void
    {
        $this->isTextPartIncluded = $isTextPartIncluded;
    }

    /**
     * @return string
     */
    public function getReplyEmail(): string
    {
        return $this->replyEmail;
    }

    /**
     * @param string $replyEmail
     * @return void
     */
    public function setReplyEmail(string $replyEmail): void
    {
        $this->replyEmail = $replyEmail;
    }

    /**
     * @return string
     */
    public function getSenderName(): string
    {
        return $this->senderName;
    }

    /**
     * @param string $senderName
     * @return void
     */
    public function setSenderName(string $senderName): void
    {
        $this->senderName = $senderName;
    }

    /**
     * @return int
     */
    public function getTemplateID(): int
    {
        return $this->templateID;
    }

    /**
     * @param int $templateID
     * @return void
     */
    public function setTemplateID(int $templateID): void
    {
        $this->templateID = $templateID;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getCampaignID(): int
    {
        return $this->campaignID;
    }

    /**
     * @param int $campaignID
     * @return void
     */
    public function setCampaignID(int $campaignID): void
    {
        $this->campaignID = $campaignID;
    }

    /**
     * @return int
     */
    public function getContactsListID(): int
    {
        return $this->contactsListID;
    }

    /**
     * @param int $contactsListID
     * @return void
     */
    public function setContactsListID(int $contactsListID): void
    {
        $this->contactsListID = $contactsListID;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     * @return void
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getDeliveredAt(): string
    {
        return $this->deliveredAt;
    }

    /**
     * @param string $deliveredAt
     * @return void
     */
    public function setDeliveredAt(string $deliveredAt): void
    {
        $this->deliveredAt = $deliveredAt;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return void
     */
    public function setLocale(string $locale): void
    {
        $this->locale = $locale;
    }

    /**
     * @return string
     */
    public function getModifiedAt(): string
    {
        return $this->modifiedAt;
    }

    /**
     * @param string $modifiedAt
     * @return void
     */
    public function setModifiedAt(string $modifiedAt): void
    {
        $this->modifiedAt = $modifiedAt;
    }

    /**
     * @return string
     */
    public function getPreset(): string
    {
        return $this->preset;
    }

    /**
     * @param string $preset
     * @return void
     */
    public function setPreset(string $preset): void
    {
        $this->preset = $preset;
    }

    /**
     * @return int
     */
    public function getSegmentationID(): int
    {
        return $this->segmentationID;
    }

    /**
     * @param int $segmentationID
     * @return void
     */
    public function setSegmentationID(int $segmentationID): void
    {
        $this->segmentationID = $segmentationID;
    }

    /**
     * @return string
     */
    public function getSender(): string
    {
        return $this->sender;
    }

    /**
     * @param string $sender
     * @return void
     */
    public function setSender(string $sender): void
    {
        $this->sender = $sender;
    }

    /**
     * @return string
     */
    public function getSenderEmail(): string
    {
        return $this->senderEmail;
    }

    /**
     * @param string $senderEmail
     * @return void
     */
    public function setSenderEmail(string $senderEmail): void
    {
        $this->senderEmail = $senderEmail;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return void
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return void
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return void
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return bool
     */
    public function isUsed(): bool
    {
        return $this->used;
    }

    /**
     * @param bool $used
     * @return void
     */
    public function setUsed(bool $used): void
    {
        $this->used = $used;
    }
}