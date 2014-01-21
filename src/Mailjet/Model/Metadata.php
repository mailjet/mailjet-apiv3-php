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

use Mailjet\Type\TResourceOps;

/**
 * Metadata Model
 *
 * Mailjet API meta data
 */
class Metadata implements ModelInterface
{

    /**
     * Description of resource.
     */
    protected $Description = null;

    /**
     * Applicable filters for this resource
     */
    protected $Filters = null;

    /**
     * Is the resource inherently read-only
     */
    protected $IsReadOnly = false;

    /**
     * Unique name of the resource
     */
    protected $Name = null;

    /**
     * List of allowed operations in private API
     */
    protected $PrivateOperations = null;

    /**
     * List of properties for this resource.
     */
    protected $Properties = null;

    /**
     * List of allowed operations in public API
     */
    protected $PublicOperations = null;

    /**
     * Information about the fields on which a list of this resource can be sorted.
     */
    protected $SortInfo = null;

    /**
     * Name of the property which can be used as an alternative unique key in the URL
     * (other than the ID)
     */
    protected $UniqueKey = null;

    /**
     * Sets the Description of resource.
     *
     * @param string
     * @return Metadata
     */
    public function setDescription($Description = null)
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * Gets the Description of resource.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Sets the Applicable filters for this resource
     *
     * @param int
     * @return Metadata
     */
    public function setFilters($Filters = null)
    {
        $this->Filters = $Filters;
        return $this;
    }

    /**
     * Gets the Applicable filters for this resource
     *
     * @return int
     */
    public function getFilters()
    {
        return $this->Filters;
    }

    /**
     * Sets the Is the resource inherently read-only
     *
     * @param bool
     * @return Metadata
     */
    public function setIsReadOnly($IsReadOnly = null)
    {
        $this->IsReadOnly = $IsReadOnly;
        return $this;
    }

    /**
     * Gets the Is the resource inherently read-only
     *
     * @return bool
     */
    public function getIsReadOnly()
    {
        return $this->IsReadOnly;
    }

    /**
     * Sets the Unique name of the resource
     *
     * @param string
     * @return Metadata
     */
    public function setName($Name = null)
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * Gets the Unique name of the resource
     *
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Sets the List of allowed operations in private API
     *
     * @param TResourceOps
     * @return Metadata
     */
    public function setPrivateOperations(TResourceOps $PrivateOperations = null)
    {
        $this->PrivateOperations = $PrivateOperations;
        return $this;
    }

    /**
     * Gets the List of allowed operations in private API
     *
     * @return TResourceOps
     */
    public function getPrivateOperations()
    {
        return $this->PrivateOperations;
    }

    /**
     * Sets the List of properties for this resource.
     *
     * @param int
     * @return Metadata
     */
    public function setProperties($Properties = null)
    {
        $this->Properties = $Properties;
        return $this;
    }

    /**
     * Gets the List of properties for this resource.
     *
     * @return int
     */
    public function getProperties()
    {
        return $this->Properties;
    }

    /**
     * Sets the List of allowed operations in public API
     *
     * @param TResourceOps
     * @return Metadata
     */
    public function setPublicOperations(TResourceOps $PublicOperations = null)
    {
        $this->PublicOperations = $PublicOperations;
        return $this;
    }

    /**
     * Gets the List of allowed operations in public API
     *
     * @return TResourceOps
     */
    public function getPublicOperations()
    {
        return $this->PublicOperations;
    }

    /**
     * Sets the Information about the fields on which a list of this resource can be
     * sorted.
     *
     * @param int
     * @return Metadata
     */
    public function setSortInfo($SortInfo = null)
    {
        $this->SortInfo = $SortInfo;
        return $this;
    }

    /**
     * Gets the Information about the fields on which a list of this resource can be
     * sorted.
     *
     * @return int
     */
    public function getSortInfo()
    {
        return $this->SortInfo;
    }

    /**
     * Sets the Name of the property which can be used as an alternative unique key in
     * the URL (other than the ID)
     *
     * @param string
     * @return Metadata
     */
    public function setUniqueKey($UniqueKey = null)
    {
        $this->UniqueKey = $UniqueKey;
        return $this;
    }

    /**
     * Gets the Name of the property which can be used as an alternative unique key in
     * the URL (other than the ID)
     *
     * @return string
     */
    public function getUniqueKey()
    {
        return $this->UniqueKey;
    }


}

