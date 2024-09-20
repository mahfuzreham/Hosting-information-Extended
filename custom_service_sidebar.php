<?php
use WHMCS\View\Menu\Item as MenuItem;
use Illuminate\Database\Capsule\Manager as Capsule;

/* Add credentials to the end of all secondary sidebars.
*/
add_hook('ClientAreaSecondarySidebar', 1, function (MenuItem $secondarySidebar)
{
    /* Get the credentials. */
    $service = Menu::context('service');
    $username = "{$service->username}";
    $serverid = "{$service->server}";
    $domain = "{$service->domain}";
    $password = "{$service->password}";
    $server = Capsule::table('tblservers')->where('id', '=', $serverid)->pluck('hostname');
    $ipaddress = Capsule::table('tblservers')->where('id', '=', $serverid)->pluck('ipaddress');
    $name1 = Capsule::table('tblservers')->where('id', '=', $serverid)->pluck('nameserver1');
    $name2 = Capsule::table('tblservers')->where('id', '=', $serverid)->pluck('nameserver2');
    if (is_array($name2))
    {
        $name2 = $name2['0'];
    }

    if (is_array($name1))
    {
        $name1 = $name1['0'];
    }

    if (is_array($ipaddress))
    {
        $ipaddress = $ipaddress['0'];
    }

    if (is_array($server))
    {
        $server = $server['0'];
    }
    $password = decrypt($password);
    /* If the username isn't empty let's show them! */
    if ($username != '') {
        /*
        Add a panel to the end of the secondary sidebar for credentials.
        Declare it with the name "credentials" so we can easily retrieve it
        later.
        */
        $secondarySidebar->addChild('credentials', array(
        'label' => 'Service Information',
        'uri' => '#',
        'icon' => 'fa-desktop',
        ));
        /* Retrieve the panel we just created. */
        $credentialPanel = $secondarySidebar->getChild('credentials');
        $credentialPanel->moveToBack();
        /* Show the username. */
        $credentialPanel->addChild('username', array(
        'label' => $username,
        'order' => 1,
        'icon' => 'fa-user',
        ));

        /* Show the password. */
        $credentialPanel->addChild('password', array(
        'label' => $password,
        'order' => 2,
        'icon' => 'fa-lock',
        ));
        /* Show the password. */
        $credentialPanel->addChild('domain', array(
        'label' => $domain,
        'order' => 3,
        'icon' => 'fa-globe',
        ));
        /*show the server IP*/
        $credentialPanel->addChild('ip', array(
        'label' => $ipaddress,
        'order' => 4,
        'icon' => 'fa-info',
        ));
        /*show the server name*/
        $credentialPanel->addChild('server', array(
        'label' => $server,
        'order' => 5,
        'icon' => 'fa-server',
        ));

        /*NS1*/
        $credentialPanel->addChild('name1', array(
        'label' => $name1,
        'order' => 6,
        'icon' => 'fa-info-circle',
        ));
        /*NS2*/
        $credentialPanel->addChild('name2', array(
        'label' => $name2,
        'order' => 7,
        'icon' => 'fa-info-circle',
        ));
    }
});

 
