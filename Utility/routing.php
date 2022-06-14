<?php
function routing():Array{
    $athlete=[
        'Update'=>'CManageAthlete::update()',
        'Create'=>'CManageAthlete::create()',
        'Delete'=> 'CManageAthlete::delete()',
        'MainPage'=>'CManageAthlete::mainPage()',
        'NewPage'=> 'CManageAthlete::newPage()',
        'GetResult'=> 'CManageCompetitor::getResultAthlete()',
        'SearchPage'=> 'Csearch::searchPageAthlete()',
        'Search'=> 'Csearch::searchAthlete()'
    ];
    $comment=[
        'Update'=>'CManageComment::update()',
        'Create'=>'CManageComment::create()',
        'Delete'=>'CManageComment::delete()',
        'Search'=>'Csearch::searchComment()'
    ];
    $competition=[
        'Update'=>'CManageCompetition::update()',
        'Create'=>'CManageCompetition::create()',
        'Delete'=>'CManageCompetition::delete()',
        'MainPage'=>'CManageCompetition::mainPage()',
        'NewPage'=>'CManageCompetition::newPage()',
        'AddRegistration'=> 'CManageCompetitor::addRegistration()',
        'GetRegistration'=>'CManageCompetitor::getRegistration()',
        'AddResult'=>'CManageCompetitor::getResultAthlete()',
        'GetResult'=>'CManageCompetitor::getResult()',
        'SearchPage'=>'CSearch::searchPageCompetition()',
        'Search'=>'CSearch::searchCompetition()'
    ];
    $competitor=[
        'Delete'=>'CManageCompetitor::delate()'
    ];
    $event=[
        'Update'=>'CManageEvent::update()',
        'Create'=>'CManageEvent::create()',
        'Delete'=>'CManageEvent::delete()',
        'MainPage'=>'CManageEvent::mainPage()',
        'NewPage'=>'CManageEvent::newPage()',
        'SearchPage'=>'CSearch::searchPageEvent()',
        'Search'=>'CSearch::searchEvent()'
    ];
    $registration=[
        'NewPage'=>'CManageCompetitor::newPageRegistration()'
    ];
    $result=[
        'NewPage'=>'CManageCompetitor::newPageResult()'
    ];

    $controller=[
        'Athlete'=>$athlete,
        'Comment'=>$comment,
        'Competition'=>$competition,
        'Competitor'=>$competitor,
        'Event'=>$event,
        'Registration'=>$registration,
        'Result'=>$result
    ];
    $routing=[
        'Livent'=>$controller
    ];
    return $routing;
}
$routing=routing();
