function setDate(form){
    let datemin=form.dateMin.value;
    form.dateMax.min=datemin;
    let datemax=form.dateMax.value;
    form.dateMin.max=datemax;
}

function setDistanceMin(){
    let distancemin=Number(document.getElementById("disMin").value);
    let distancemax=Number(document.getElementById("disMax").value);
    if(distancemin<0){
        document.getElementById("disMin").value='0';
    }
    else if(distancemin>distancemax){
        document.getElementById("disMax").value=distancemin;
    }
}

function setDistanceMax(){
    let distancemin=Number(document.getElementById("disMin").value);
    let distancemax=Number(document.getElementById("disMax").value);
    if(distancemax<0){
        if(distancemin>0){
            document.getElementById("disMax").value=distancemin;
        }
        else document.getElementById("disMax").value='0';
    }
    else if(distancemax<distancemin){
        document.getElementById("disMin").value=distancemax;
    }
}

function setListCompetitionName(selected=''){
    Athletics=new Array(12);
    Athletics[0]='velocità pista';
    Athletics[1]='mezzofondo pista';
    Athletics[2]='fondo pista';
    Athletics[3]='velocità indoor';
    Athletics[4]='mezzofondo indoor';
    Athletics[5]='fondo indoor';
    Athletics[6]='strada';
    Athletics[7]='mezza maratona';
    Athletics[8]='maratona';
    Athletics[9]='ultra maratona';
    Athletics[10]='campestre';
    Athletics[11]='trail';

    Cicling=new Array(5);
    Cicling[0]='cronometro';
    Cicling[1]='pista';
    Cicling[2]='strada';
    Cicling[3]='montain bike';
    Cicling[4]='ciclocross';

    Swiming=new Array(3);
    Swiming[0]='piscina velocità ';
    Swiming[1]='piscina fondo';
    Swiming[2]='acque libere';

    RollerSkating=new Array(8);
    RollerSkating[0]=' pista velocità ';
    RollerSkating[1]='pista fondo';
    RollerSkating[2]=' strada velocità ';
    RollerSkating[3]='strada fondo';
    RollerSkating[4]=' velocità indoor';
    RollerSkating[5]='fondo indoor';
    RollerSkating[6]='mezza maratona';
    RollerSkating[7]='maratona';

    IceSkating=new Array(4);
    IceSkating[0]=' short track velocità ';
    IceSkating[1]=' short track fondo ';
    IceSkating[2]=' pista piana velocità ';
    IceSkating[3]='pista piana fondo';

    NameCompetition=new Array(5);
    NameCompetition["Atletica"]=Athletics;
    NameCompetition["Ciclismo"]=Cicling;
    NameCompetition["Nuoto"]=Swiming;
    NameCompetition["Pattinaggio a rotelle"]=RollerSkating;
    NameCompetition["Pattinaggio sul ghiaccio"]=IceSkating;

    document.getElementById('nameCompetitionList').options.length=0;

    let indexSelected=0;
    document.getElementById('nameCompetitionList').options[0] = new Option('Qualsiasi tipo');
    if(document.getElementById('sportList')!=null){
        let sport=document.getElementById('sportList').value;
        if(sport in NameCompetition){
            for(i=0;i<NameCompetition[sport].length;i++) {
                document.getElementById('nameCompetitionList').options[i+1] = new Option(NameCompetition[sport][i]);
                if(NameCompetition[sport][i]===selected)indexSelected=i;
            };
        }
    }

    document.getElementById('nameCompetitionList').selectedIndex=indexSelected;

}




