<?php
function routing():Array{
    $eventChronology=[
        'Delate'=>'CSearch::popEventChronology()'
    ];

    $athleteChronology=[
        'Delate'=>'CSearch::popAthleteChronology()'
    ];
    //8
    $athlete=[
        'Update'=>'CManageAthlete::update',
        'Create'=>'CManageAthlete::create',
        'Delete'=> 'CManageAthlete::delete()',
        'MainPage'=>'CManageAthlete::mainPage()',
        'NewPage'=> 'CManageAthlete::newPage()',
        'GetResult'=> 'CManageRegistration::getResultAthlete()',
        'Search'=> 'Csearch::searchAthlete',
        'Chronology'=>$athleteChronology
    ];
    //4 => 12
    $comment=[
        'Update'=>'CManageComment::update',
        'Create'=>'CManageComment::create',
        'Delete'=>'CManageComment::delete()',
        'Search'=>'Csearch::searchComment'
    ];
    //9 => 21
    $competition=[
        'Update'=>'CManageCompetition::update',
        'Create'=>'CManageCompetition::create',
        'Delete'=>'CManageCompetition::delete()',
        'MainPage'=>'CManageCompetition::mainPage()',
        'NewPage'=>'CManageCompetition::newPage()',
        'AddRegistration'=> 'CManageRegistration::addRegistration()',
        'AddResult'=>'CManageResult::addResult()',
        'SearchPage'=>'CSearch::searchPageCompetition',
        'Search'=>'CSearch::searchCompetition'
    ];
    //7 => 28
    $event=[
        'Update'=>'CManageEvent::update',
        'Create'=>'CManageEvent::create',
        'Delete'=>'CManageEvent::delete()',
        'MainPage'=>'CManageEvent::mainPage()',
        'NewPage'=>'CManageEvent::newPage()',
        'SearchPage'=>'CSearch::searchPageEvent',
        'Search'=>'CSearch::searchEvent',
        'Chronology'=>$eventChronology
    ];
    //2 => 30
    $registration=[
        'NewPage'=>'CManageRegistration::newPageRegistration()',
        'Delete'=>'CManageRegistration::delete()'
    ];
    //2 => 32
    $result=[
        'NewPage'=>'CManageResult::newPageResult()',
        'Delete'=>'CManageResult::delete()'
    ];
    //7 => 39
    $user=[
        'LoginPage'=>'CManageUser::loginPage',
        'SigninPage'=>'CManageUser::signinPage',
        'UpdatePage'=>'CManageUser::updatePage',
        'ProfilePage'=>'CManageUser::profilePage',
        'Login'=>'CManageUser::login',
        'Signin'=>'CManageUser::signin',
        'Logout'=>'CManageUser::logout',
        'Update'=>'CManageUser::update'
    ];
    //3 => 42
    $error=[
        ''=>'CError::read',
        'Delete'=>'CError::delete',
        'Download'=>'CError::getFile'
    ];

    $eventImg=[
        'Set'=>'CSystem::setDefaultEventImg'
    ];

    $logoImg=[
        'Set'=>'CSystem::setLogoImg'
    ];

    $profileImg=[
        'Set'=>'CSystem::setDefaultProfileImg'
    ];

    $homeImg=[
        'Set'=>'CSystem::setHomeImg',
        'Delate'=>'CSystem::deleteHomeImg()'
    ];

    $graphics=[
        ''=>'CSystem::showSetGraphicPage',
        'HomeImg'=>$homeImg,
        'DefaultProfile'=>$profileImg,
        'DefaultEvent'=>$eventImg,
        'Logo'=>$logoImg
    ];

    //1 =>43
    $controller=[
        'Athlete'=>$athlete,
        'Comment'=>$comment,
        'Competition'=>$competition,
        'Event'=>$event,
        'Registration'=>$registration,
        'Result'=>$result,
        'User'=>$user,
        'Error'=>$error,
        'Graphics'=>$graphics,
        ''=>'CSystem::HomePage'
    ];
    $routing=[
        'Livent'=>$controller
    ];
    return $routing;
}
$routing=routing();
