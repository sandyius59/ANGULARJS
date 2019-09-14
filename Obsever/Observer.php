<?php
interface SplMessage
{
    /**
     * subscribe an OurObserver
     * @param OurObserver $observer
     * @return void
     */
    public function subscribe(OurObserver $observer);
    /**
     * unsubscribe an observer
     * @param OurObserver $observe
     * @return void
     */
    public function unsubscribe(OurObserver $observer);
    /**
     * NotifyMsg an observer
     * @return void
     */
    public function notifyMsg();
}
interface OurObserver
{
    /**
     * Receive update from subject
     * @param SplMessage $subject
     * @return void
     */
    public function updateMsg(SplMessage $subject);
}
class PublisherMsg implements SplMessage
{
    /**
     * @var array
     */
    protected $linkedList = array();
    /**
     * @var array
     */
    protected $observers = array();
    /**
     *
     * @param string
     */
    protected $name;
    /**
     *
     * @param string
     */
    protected $event;
    public function __construct($name)
    {
        $this->name = $name;
    }
    /**
     *  Associate an observer
     *
     * @param OurObserver $observer
     * @return PublisherMsg;
     */
    public function subscribe(OurObserver $observer)
    {
        $observerKey = spl_object_hash($observer);
        $this->observers[$observerKey] = $observer;
        $this->linkedList[$observerKey] = $observer->getPriority();
        arsort($this->linkedList);
    }
    /**
     * @param OurObserver $observer
     * @return void
     */
    public function unsubscribe(OurObserver $observer)
    {
        $observerKey = spl_object_hash($observer);
        unset($this->observers[$observerKey]);
        unset($this->linkedList[$observerKey]);
    }
    /**
     * @return void
     */
    public function notifyMsg()
    {
        foreach ($this->linkedList as $key => $value) {
            $this->observers[$key]->updateMsg($this);
        }
    }
    /**
     * Set or update event
     *
     * @param $event
     * @return void
     */
    public function setEvent($event)
    {
        $this->event = $event;
        $this->notifyMsg();
    }
    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }
    public function getSubscribers()
    {
        return $this->getSubscribers();
    }
}
class ObserverMsg implements OurObserver
{
    /**
     * @var  string
     */
    protected $name;
    /**
     * @var int
     */
    protected $priority = 0;
    /**
     * Accepts observer name and priority, default to zero
     */
    public function __construct($name, $priority = 0)
    {
        $this->name = $name;
        $this->priority = $priority;
    }
}
