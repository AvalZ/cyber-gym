(function(){

  var tour = new Tour({
    storage: false,
    steps: [
    {
      element: '#server-side',
      title: 'Server Side attacks',
      backdrop: true,
      placement: 'right',
      content: 'In this section we can find some of the most common Server Side attacks, like SQL Injections and Command Injections.<hr>' +
        'Server Side attacks\' aim is to damage, control or extract informations from a vulnerable server.'
    },
    {
      element: '#server-side>ul>li:nth-child(1)',
      title: 'SQL Injection (SQLi)',
      backdrop: true,
      placement: 'right',
      content: 'SQL Injection attacks leverage unfiltered input to the SQL interpreter in order to bypass controls, execute arbitrary actions on database or extract sensitive informations.'
    },
    {
      element: '#server-side>ul>li:nth-child(2)',
      title: 'Command Injection',
      backdrop: true,
      placement: 'right',
      content: 'Command Injection attacks leverage unfiltered input to a Bash (or other shell) interpreter in order to execute arbitrary commands on the target machine.'
    },
    {
      element: '#client-side',
      title: 'Client Side attacks',
      backdrop: true,
      placement: 'left',
      content: 'In this section we can find some of the most common Client Side attacks, like XSS, CSRF and ClickJacking.<hr>' +
        'Client Side attacks\' aim is to obtain user credentials or trick the user into performing authenticated actions.'
    },
    {
      element: '#client-side>ul>li:nth-child(1)',
      title: 'Cross-Site Scripting (XSS)',
      backdrop: true,
      placement: 'left',
      content: 'Cross-Site Scripting attacks leverage on unfiltered user output (reflected or stored in a database) to inject elements (like JavaScript, images, iframes, etc.) in the DOM.'
    },
    {
      element: '#client-side>ul>li:nth-child(2)',
      title: 'Cross-Site Request Forgery (CSRF)',
      backdrop: true,
      placement: 'left',
      content: 'Cross-Site Request Forgery aims at making the user perform an action on a site with his active work session.'
    },
    {
      element: '#client-side>ul>li:nth-child(3)',
      title: 'ClickJacking',
      backdrop: true,
      placement: 'left',
      content: 'Also known as UI Redressing, it tricks a user into clicking on something different from what he perceives he\'s clicking on.<hr>'
        + 'A small demo is presented here, explaining how this technique can be used to make an user click on a hidden button.'
    }

    ]    
  });

  tour.init();

  tour.start();

}());
