<?php
function routing():Array{
    $eventChronology=[
        'Delete'=>'CSearch::popEventChronology()'
    ];

    $competitionChronology=[
        'Delete'=>'CSearch::popCompetitionChronology()'
    ];

    $athleteChronology=[
        'Delete'=>'CSearch::popAthleteChronology()'
    ];
    //8
    $athlete=[
        'Update'=>'CManageAthlete::update()',
        'Create'=>'CManageAthlete::create',
        'Delete'=> 'CManageAthlete::delete()',
        'MainPage'=>'CManageAthlete::mainPage()',
        'NewPage'=> 'CManageAthlete::newPage',
        'UpdatePage'=>'CManageAthlete::UpdatePage()',
        //'GetResult'=> 'CManageRegistration::getResultAthlete()',
        'Search'=> 'Csearch::searchAthlete',
        'Chronology'=>$athleteChronology
    ];
    //9 => 21
    $competition=[
        'Update'=>'CManageCompetition::update()',
        'Create'=>'CManageCompetition::create()',
        'Delete'=>'CManageCompetition::delete()',
        'MainPage'=>'CManageCompetition::mainPage()',
        'NewPage'=>'CManageCompetition::newPage()',
        'UpdatePage'=>'CManageCompetition::updatePage()',
        'DeletePage'=>'CManageCompetition::deletePage()',
        'AddRegistration'=> 'CManageRegistration::addRegistration()',
        'AddResult'=>'CManageResult::addResult()',
        //'SearchPage'=>'CSearch::searchPageCompetition',
        'Search'=>'CSearch::searchCompetition',
        'Chronology'=>$competitionChronology
    ];
    //7 => 28
    $event=[
        'Update'=>'CManageEvent::update()',
        'Create'=>'CManageEvent::create',
        'Delete'=>'CManageEvent::delete()',
        'MainPage'=>'CManageEvent::mainPage()',
        'UpdatePage'=>'CManageEvent::UpdatePage()',
        'NewPage'=>'CManageEvent::newPage',
        'DeletePage'=>'CManageEvent::deletePage()',
        //'SearchPage'=>'CSearch::searchPageEvent',
        'Search'=>'CSearch::searchEvent',
        'Chronology'=>$eventChronology
    ];
    //2 => 30
    $registration=[
        'NewPage'=>'CManageRegistration::newPageRegistration()',
        'DeletePage'=>'CManageRegistration::deletePage()',
        'Delete'=>'CManageRegistration::deleteRegistration()'
    ];
    //2 => 32
    $result=[
        'NewPage'=>'CManageResult::newPageResult()',
        'DeletePage'=>'CManageResult::deletePage()',
        'Delete'=>'CManageResult::delete()'
    ];
    //7 => 39
    $user=[
        'LoginPage'=>'CManageUser::loginPage',
        'SigninPage'=>'CManageUser::signinPage',
        'UpdatePage'=>'CManageUser::updatePage',
        'DeletePage'=>'CManageUser::deletePage()',
        'ProfilePage'=>'CManageUser::profilePage',
        'Login'=>'CManageUser::login',
        'Signin'=>'CManageUser::signin',
        'Logout'=>'CManageUser::logout',
        'Update'=>'CManageUser::update',
        'Delete'=>'CManageUser::delete()',
        //'DeleteAdmin'=>'CManageUser::deleteAdmin()',
        'Search'=>'CManageUser::search'
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
