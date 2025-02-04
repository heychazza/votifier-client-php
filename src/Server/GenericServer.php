<?php

/**
 * Votifier PHP Client
 *
 * @package   VotifierClient
 * @author    Manuele Vaccari <manuele.vaccari@gmail.com>
 * @copyright Copyright (c) 2017-2020 Manuele Vaccari <manuele.vaccari@gmail.com>
 * @license   https://github.com/D3strukt0r/votifier-client-php/blob/master/LICENSE.txt GNU General Public License v3.0
 * @link      https://github.com/D3strukt0r/votifier-client-php
 */

namespace D3strukt0r\Votifier\Client\Server;

use D3strukt0r\Votifier\Client\Socket;

/**
 * An abstract class that has all the important functions included for every server.
 */
abstract class GenericServer implements ServerInterface
{
    /**
     * @var Socket The socket object
     */
    protected $socket;

    /**
     * @var string the domain or ip to connect to Votifier
     */
    protected $host;

    /**
     * @var int the port which votifier uses on the server
     */
    protected $port = 8192;

    /**
     * @var string The public.key which is generated by the plugin
     */
    protected $publicKey;

    /**
     * Gets the Socket.
     *
     * @return Socket returns a Socket object
     */
    public function getSocket(): Socket
    {
        return null === $this->socket ? $this->socket = new Socket() : $this->socket;
    }

    /**
     * Sets the Socket.
     *
     * @param Socket $socket The socket object
     *
     * @return $this returns the class itself, for doing multiple things at once
     */
    public function setSocket(Socket $socket): self
    {
        $this->socket = $socket;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getHost(): ?string
    {
        return $this->host;
    }

    /**
     * {@inheritdoc}
     */
    public function setHost(string $host): self
    {
        $this->host = $host;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * {@inheritdoc}
     */
    public function setPort(int $port): self
    {
        $this->port = $port;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPublicKey(): ?string
    {
        return $this->publicKey;
    }

    /**
     * {@inheritdoc}
     */
    public function setPublicKey(string $publicKey): self
    {
        $this->publicKey = "-----BEGIN PUBLIC KEY-----\n{$publicKey}\n-----END PUBLIC KEY-----\n";

        return $this;
    }
}
