function p_tab_switch(dif)
{
    var easy = document.getElementById('easy_block');
    var med = document.getElementById('med_block');
    var hard = document.getElementById('hard_block');
    if(dif == 1)
    {
        easy.style.display = 'block';
        med.style.display = 'none';
        hard.style.display = 'none';
    }
    else if(dif==2)
    {
        easy.style.display = 'none';
        med.style.display = 'block';
        hard.style.display = 'none';
    }
    else if(dif==3)
    {
        easy.style.display = 'none';
        med.style.display = 'none';
        hard.style.display = 'block';
    }
}