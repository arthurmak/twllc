<?php

namespace Drupal\freehk_world\EventSubscriber;

use Drupal\Core\Routing\LocalRedirectResponse;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\Core\Url;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Event subscriber for redirecting to the homepage.
 *
 * Subscribes to the Kernel Request event and redirects to the homepage
 * when the user has the "non_grata" role.
 */
class FreehkWorldRedirectSubscriber implements EventSubscriberInterface {

  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
   * The current route match.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  protected $currentRouteMatch;

  /**
   * TwllcWorldRedirectSubscriber constructor.
   *
   * @param \Drupal\Core\Session\AccountProxyInterface $currentUser
   *   The current user.
   * @param \Drupal\Core\Routing\RouteMatchInterface $currentRouteMatch
   *   The current route match.
   */
  public function __construct(AccountProxyInterface $currentUser, RouteMatchInterface $currentRouteMatch) {
    $this->currentUser = $currentUser;
    $this->currentRouteMatch = $currentRouteMatch;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = ['onRequest', 0];
    return $events;
  }

  /**
   * Handler for the kernel request event.
   *
   * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
   *   The event.
   */
  public function onRequest(GetResponseEvent $event) {
    $route_name = $this->currentRouteMatch->getRouteName();
    if ($route_name !== 'freehk_world.freehk') {
      return;
    }
   
    $roles = $this->currentUser->getRoles();
    
    foreach ($roles as &$r) {
    
      switch ($r) {
        case 'bronze':
          $url = Url::fromUri('internal:/bronze');
          $event->setResponse(new LocalRedirectResponse($url->toString()));
          break;
        case 'gold':
          $url = Url::fromUri('internal:/gold');
          $event->setResponse(new LocalRedirectResponse($url->toString()));
          break;
        default:
          $url = Url::fromUri('internal:/opencontent');
          $event->setResponse(new LocalRedirectResponse($url->toString()));
          break;
      }  
    }
  }
}
