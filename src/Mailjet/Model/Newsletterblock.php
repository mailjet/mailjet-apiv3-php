<?php
/**
 * MailJet Model
 *
 * Copyright (c) 2013, Mailjet.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 *     * Redistributions of source code must retain the above copyright notice,
 *       this list of conditions and the following disclaimer.
 *
 *     * Redistributions in binary form must reproduce the above copyright notice,
 *       this list of conditions and the following disclaimer in the documentation
 *       and/or other materials provided with the distribution.
 *
 *     * Neither the name of Zend Technologies USA, Inc. nor the names of its
 *       contributors may be used to endorse or promote products derived from this
 *       software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
 * ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */


namespace Mailjet\Model;

/**
 * Newsletterblock Model
 *
 * HTML data for a block from a newsletter
 */
class Newsletterblock implements ModelInterface
{

    /**
     * Align attribute value
     */
    protected $Align = null;

    /**
     * Alt attribute value
     */
    protected $Alt = null;

    /**
     * Block type (tag)
     */
    protected $BlockType = null;

    /**
     * Color attribute value
     */
    protected $Color = null;

    /**
     * Tag content
     */
    protected $Content = null;

    /**
     * Filename
     */
    protected $Filename = null;

    /**
     * Font family
     */
    protected $Fontfamily = null;

    /**
     * Font size
     */
    protected $Fontsize = null;

    /**
     * Unique numerical ID for this object
     */
    protected $ID = null;

    /**
     * Line number
     */
    protected $Line = null;

    /**
     * ?
     */
    protected $Link = null;

    /**
     * Reference to newsletter
     */
    protected $NewsLetterID = null;

    /**
     * Position (sorting
     */
    protected $Pos = null;

    /**
     * Number of siblings
     */
    protected $Siblings = null;

    /**
     * Height attribute
     */
    protected $SrcHeight = null;

    /**
     * ?Width attribute
     */
    protected $SrcWidth = null;

    /**
     * URL in case of external link
     */
    protected $Url = null;

    /**
     * Width attribute
     */
    protected $Width = null;

    /**
     * Sets the Align attribute value
     *
     * @param string
     * @return Newsletterblock
     */
    public function setAlign($Align = null)
    {
        $this->Align = $Align;
        return $this;
    }

    /**
     * Gets the Align attribute value
     *
     * @return string
     */
    public function getAlign()
    {
        return $this->Align;
    }

    /**
     * Sets the Alt attribute value
     *
     * @param string
     * @return Newsletterblock
     */
    public function setAlt($Alt = null)
    {
        $this->Alt = $Alt;
        return $this;
    }

    /**
     * Gets the Alt attribute value
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->Alt;
    }

    /**
     * Sets the Block type (tag)
     *
     * @param string
     * @return Newsletterblock
     */
    public function setBlockType($BlockType = null)
    {
        $this->BlockType = $BlockType;
        return $this;
    }

    /**
     * Gets the Block type (tag)
     *
     * @return string
     */
    public function getBlockType()
    {
        return $this->BlockType;
    }

    /**
     * Sets the Color attribute value
     *
     * @param string
     * @return Newsletterblock
     */
    public function setColor($Color = null)
    {
        $this->Color = $Color;
        return $this;
    }

    /**
     * Gets the Color attribute value
     *
     * @return string
     */
    public function getColor()
    {
        return $this->Color;
    }

    /**
     * Sets the Tag content
     *
     * @param string
     * @return Newsletterblock
     */
    public function setContent($Content = null)
    {
        $this->Content = $Content;
        return $this;
    }

    /**
     * Gets the Tag content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->Content;
    }

    /**
     * Sets the Filename
     *
     * @param string
     * @return Newsletterblock
     */
    public function setFilename($Filename = null)
    {
        $this->Filename = $Filename;
        return $this;
    }

    /**
     * Gets the Filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->Filename;
    }

    /**
     * Sets the Font family
     *
     * @param string
     * @return Newsletterblock
     */
    public function setFontfamily($Fontfamily = null)
    {
        $this->Fontfamily = $Fontfamily;
        return $this;
    }

    /**
     * Gets the Font family
     *
     * @return string
     */
    public function getFontfamily()
    {
        return $this->Fontfamily;
    }

    /**
     * Sets the Font size
     *
     * @param string
     * @return Newsletterblock
     */
    public function setFontsize($Fontsize = null)
    {
        $this->Fontsize = $Fontsize;
        return $this;
    }

    /**
     * Gets the Font size
     *
     * @return string
     */
    public function getFontsize()
    {
        return $this->Fontsize;
    }

    /**
     * Sets the Unique numerical ID for this object
     *
     * @param int
     * @return Newsletterblock
     */
    public function setID($ID = null)
    {
        $this->ID = $ID;
        return $this;
    }

    /**
     * Gets the Unique numerical ID for this object
     *
     * @return int
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Sets the Line number
     *
     * @param int
     * @return Newsletterblock
     */
    public function setLine($Line = null)
    {
        $this->Line = $Line;
        return $this;
    }

    /**
     * Gets the Line number
     *
     * @return int
     */
    public function getLine()
    {
        return $this->Line;
    }

    /**
     * Sets the ?
     *
     * @param string
     * @return Newsletterblock
     */
    public function setLink($Link = null)
    {
        $this->Link = $Link;
        return $this;
    }

    /**
     * Gets the ?
     *
     * @return string
     */
    public function getLink()
    {
        return $this->Link;
    }

    /**
     * Sets the Reference to newsletter
     *
     * @param int
     * @return Newsletterblock
     */
    public function setNewsLetterID($NewsLetterID)
    {
        $this->NewsLetterID = $NewsLetterID;
        return $this;
    }

    /**
     * Gets the Reference to newsletter
     *
     * @return int
     */
    public function getNewsLetterID()
    {
        return $this->NewsLetterID;
    }

    /**
     * Sets the Position (sorting
     *
     * @param int
     * @return Newsletterblock
     */
    public function setPos($Pos = null)
    {
        $this->Pos = $Pos;
        return $this;
    }

    /**
     * Gets the Position (sorting
     *
     * @return int
     */
    public function getPos()
    {
        return $this->Pos;
    }

    /**
     * Sets the Number of siblings
     *
     * @param int
     * @return Newsletterblock
     */
    public function setSiblings($Siblings = null)
    {
        $this->Siblings = $Siblings;
        return $this;
    }

    /**
     * Gets the Number of siblings
     *
     * @return int
     */
    public function getSiblings()
    {
        return $this->Siblings;
    }

    /**
     * Sets the Height attribute
     *
     * @param int
     * @return Newsletterblock
     */
    public function setSrcHeight($SrcHeight = null)
    {
        $this->SrcHeight = $SrcHeight;
        return $this;
    }

    /**
     * Gets the Height attribute
     *
     * @return int
     */
    public function getSrcHeight()
    {
        return $this->SrcHeight;
    }

    /**
     * Sets the ?Width attribute
     *
     * @param int
     * @return Newsletterblock
     */
    public function setSrcWidth($SrcWidth = null)
    {
        $this->SrcWidth = $SrcWidth;
        return $this;
    }

    /**
     * Gets the ?Width attribute
     *
     * @return int
     */
    public function getSrcWidth()
    {
        return $this->SrcWidth;
    }

    /**
     * Sets the URL in case of external link
     *
     * @param string
     * @return Newsletterblock
     */
    public function setUrl($Url = null)
    {
        $this->Url = $Url;
        return $this;
    }

    /**
     * Gets the URL in case of external link
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->Url;
    }

    /**
     * Sets the Width attribute
     *
     * @param string
     * @return Newsletterblock
     */
    public function setWidth($Width = null)
    {
        $this->Width = $Width;
        return $this;
    }

    /**
     * Gets the Width attribute
     *
     * @return string
     */
    public function getWidth()
    {
        return $this->Width;
    }


}

