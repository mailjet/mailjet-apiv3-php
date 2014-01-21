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

use Mailjet\Type\TManyContactsAction;
use Mailjet\Api\ResultSet\ResultSet;
use Mailjet\Api\ResultSet\Exception;

/**
 * Manycontacts Model
 *
 * Special resource to add more than 1 contact in 1 call
 */
class Manycontacts implements ModelInterface
{

    /**
     * Action to perform when POST is done.
     */
    protected $Action = 'Add';

    /**
     * Array of email addresses
     */
    protected $Addresses = null;

    /**
     * On return, filled with errors.
     */
    protected $Errors = null;

    /**
     * Should subscription be enforced ?
     */
    protected $Force = false;

    /**
     * Rereference to Contactslist to which to subscribe.
     */
    protected $ListID = null;

    /**
     * On return contains a list of create listrecipients.
     */
    protected $Recipients = null;

    /**
     * Sets the Action to perform when POST is done.
     *
     * @param TManyContactsAction
     * @return Manycontacts
     */
    public function setAction(TManyContactsAction $Action = null)
    {
        $this->Action = $Action;
        return $this;
    }

    /**
     * Gets the Action to perform when POST is done.
     *
     * @return TManyContactsAction
     */
    public function getAction()
    {
        return $this->Action;
    }

    /**
     * Sets the Array of email addresses
     *
     * @param array
     * @return Manycontacts
     */
    public function setAddresses(array $Addresses)
    {
        $this->Addresses = $Addresses;
        return $this;
    }

    /**
     * Gets the Array of email addresses
     *
     * @return array
     */
    public function getAddresses()
    {
        return $this->Addresses;
    }

    /**
     * Sets the On return, filled with errors.
     *
     * @param int
     * @return Manycontacts
     */
    public function setErrors($Errors = null)
    {
        $this->Errors = $Errors;
        return $this;
    }

    /**
     * Gets the On return, filled with errors.
     *
     * @return int
     */
    public function getErrors()
    {
        return $this->Errors;
    }

    /**
     * Sets the Should subscription be enforced ?
     *
     * @param bool
     * @return Manycontacts
     */
    public function setForce($Force = null)
    {
        $this->Force = $Force;
        return $this;
    }

    /**
     * Gets the Should subscription be enforced ?
     *
     * @return bool
     */
    public function getForce()
    {
        return $this->Force;
    }

    /**
     * Sets the Rereference to Contactslist to which to subscribe.
     *
     * @param int
     * @return Manycontacts
     */
    public function setListID($ListID)
    {
        $this->ListID = $ListID;
        return $this;
    }

    /**
     * Gets the Rereference to Contactslist to which to subscribe.
     *
     * @return int
     */
    public function getListID()
    {
        return $this->ListID;
    }

    /**
     * Sets the On return contains a list of create listrecipients.
     *
     * @param ResultSet
     * @return Manycontacts
     */
    public function setRecipients($Recipients = null)
    {
        if (! ($Recipients instanceof \Closure || $Recipients instanceof ResultSet)) {
           throw new Exception\InvalidArgumentException("Recipients must be an instance of 'ResultSet' or \Closure");
        }

        $this->Recipients = $Recipients;
        return $this;
    }

    /**
     * Gets the On return contains a list of create listrecipients.
     *
     * @return ResultSet
     */
    public function getRecipients()
    {
        if ($this->Recipients instanceof \Closure) {
           $this->Recipients = call_user_func($this->Recipients);
        }
        if (! $this->Recipients instanceof ResultSet) {
            $this->Recipients = new ResultSet();
        }

        return $this->Recipients;
    }

    /**
     * Add new item to Recipients
     *
     * @return bool
     */
    public function addRecipientsItem(ListRecipientList $item)
    {
        return $this->getRecipients()->add($item);
    }

    /**
     * Remove $item from Recipients
     *
     * @return bool
     */
    public function removeRecipientsItem(ListRecipientList $item)
    {
        return $this->getRecipients()->remove($item);
    }


}

