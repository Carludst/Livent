function setDate(form){
    let datemin=form.dateMin.value;
    form.dateMax.min=datemin;
    let datemax=form.dateMax.value;
    form.dateMin.max=datemax;
}