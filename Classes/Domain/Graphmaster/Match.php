<?php
namespace R3H6\Chatbot\Domain\Graphmaster;

/***
 *
 * This file is part of the "Chatbot" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 R3 H6 <r3h6@outlook.com>
 *
 ***/

/**
 * Map
 */
class Match
{
    private $star;

    private $template;

    public function __construct()
    {

    }



    /**
     * @return mixed
     */
    public function getStar()
    {
        return $this->star;
    }

    /**
     * @param mixed $star
     *
     * @return self
     */
    public function setStar(string $word, string $type)
    {
        if (!isset($this->star[$type])) {
            $this->star[$type] = [];
        }
        $this->star[$type][] = $star;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     *
     * @return self
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }
}
