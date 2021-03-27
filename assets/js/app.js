

/**
 * This function will toggle between day and night theme by
 * applying a data attribute to DOM parent element.
 * 
 * It checks the current data attribute and just sets the
 * opposite i.e. day becomes night, night becomes day.
 */
function switchTheme() {
  const documentElement = $(document.documentElement);
  if(documentElement.attr('data-theme') === 'day') {
    documentElement.attr('data-theme', 'night');
    $('#theme-btn').text('Day Theme');
  } else {
    documentElement.attr('data-theme', 'day');
    $('#theme-btn').text('Night Theme');
  }
}
