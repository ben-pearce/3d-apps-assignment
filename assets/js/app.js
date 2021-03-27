





/**
 * Enables a rotation timer in the 3D model.
 * 
 * Assuming model has a rotation timer in format
 * [direction]RotationTimer, it will enable the rotation
 * timer for that direction.
 * 
 * @param {string} direction The direction of the timer to enable.
 */
function modelRotate(direction) {
  modelStopRotate();
  $(`#model__${direction}RotationTimer`).attr('enabled', 'true');
}

/**
 * Disables all rotation timers.
 */
function modelStopRotate() {
  $(`#model__xRotationTimer`).attr('enabled', 'false');
  $(`#model__yRotationTimer`).attr('enabled', 'false');
  $(`#model__zRotationTimer`).attr('enabled', 'false');
}

/**
 * Used for switching between poly and wire mode.
 * 
 * i.e. Displaying the model as a wireframe.
 * 
 * Parameter is the value returned by x3dom's togglePoints()
 * method.
 * 
 * 0 - Polygom view
 * 1 - Corner view?
 * 2 - Wireframe view
 * 
 * Also sets the correct radio button to enable in the
 * render & lighting card on the model page.
 * 
 * @param {integer} value The view to switch the model to.
 */
function modelSetPoints(value) {
  if(value === 0) {
    $('#render-poly-btn').prop('checked', true);
  } else {
    $('#render-wire-btn').prop('checked', true);
  }

  let points = null;
  while(points !== value) {
    points = $('#model')[0].runtime.togglePoints(true);
  }
}

/**
 * Toggles point light in the 3D model.
 * 
 * Assuming model has lights in format [direction]Light
 * it will set the light state on or off.
 * 
 * Also sets active class value on the appropriate button
 * to indicate whether light is on or off.
 * 
 * @param {string} direction The direction of light to toggle.
 * @param {boolean} newState Boolean that indicates whether to toggle 
 * light on or off.
 */
function modelTogglePointLight(direction, newState) {
  if(newState === undefined) {
    const currentState = $(`#model__${direction}Light`).attr('on');
    newState = currentState !== 'true';
  }

  $(`#model__${direction}Light`).attr('on', newState);
  $(`#light-${direction}-btn`).toggleClass('active', newState);
}

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
