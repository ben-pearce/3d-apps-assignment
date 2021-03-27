


/**
 * Toggles headlight on the 3D model NavInfo.
 * 
 * Also sets active class on headlight button to indicate
 * whether headlight is on or off.
 * 
 * @param {boolean} newState Boolean that indicates whether to toggle
 * headlight on or off.
 */
function modelToggleHeadlight(newState) {
  if(newState === undefined) {
    const  currentState = $(`#model__NavInfo`).attr('headlight');
    newState = currentState !== 'true';
  }

  $(`#model__NavInfo`).attr('headlight', newState.toString());
  $('#light-headlight-btn').toggleClass('active', newState)
}

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
