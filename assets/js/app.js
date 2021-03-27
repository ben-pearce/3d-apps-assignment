
/**
 * This class contains a number of static  methods 
 * which will be invoked prior to updating the page
 * content.
 * 
 * Each time the user switches pages the go() method
 * will invoke a method from this class which will in turn
 * collect any data required for that page from the backend
 * and load it into the new page content.
 * 
 * It may also assign page event listeners like on click
 * event handlers for buttons.
 * 
 * This is really just a neat way of separating code
 * required for each page.
 */
class PageSetupHandlers {






}

/**
 * Map page key to its respective setup handler 
 * method. 
 * 
 * This is used by the go() method to dicover which
 * setup handler method it should invoke when switching
 * between pages.
 * 
 */
const pageHandlers = {
  'home': PageSetupHandlers.home,
  'model': PageSetupHandlers.model,
  'about': PageSetupHandlers.about
};

/**
 * This method is responsible for loading a new page
 * dynamically from the back-end using the MVC model.
 * 
 * First it displays a bootstrap spinner to indicate
 * loading is in progress by replacing the content 
 * tag inner HTML.
 * 
 * Then it starts an AJAX request call to the backend for
 * the content of the new page.
 * 
 * It invokes a setup function from PageSetupHandlers to
 * ensure the page is ready to be displayed, with any
 * other content loaded in and any event listeners
 * set.
 * 
 * Finally it replaced the content tag inner HTML again 
 * this time with the content for the new page.
 * 
 * @param {string} page The page to switch to (i.e. 'home').
 * @param {object} attrs Attributes object that will be 
 * passed to the page setup method.
 */
function go(page, attrs) {
  // remove 'active' class from all navbar links
  $(`.navbar-nav *[data-page-link]`).removeClass('active');
  let pageLink = $(`.navbar-nav *[data-page-link="${page}"]`)

  if(attrs) {
    pageLink = pageLink.filter(`[data-page-attrs='${JSON.stringify(attrs)}']`)
  }

  // apply 'active' call to the navbar link for the new page
  pageLink.addClass('active');

  $('#content').html($('<div></div>')
    .addClass('text-center').html($('<div></div>')
      .addClass(['text-danger', 'mt-5', 'mb-5', 'spinner-border'])
      .attr('role', 'status')))

  // find the correct page handler to execute
  const pageHandler = pageHandlers[page];

  // encode attributes as URL params so they can be passed to the backend
  // as GET parameters.
  const searchParams = new URLSearchParams(attrs).toString();

  // submit ajax request with correct page and GET url params.
  $.ajax(
    `index.php/apiGet${page.charAt(0).toUpperCase() + page.slice(1)}?${searchParams}`, 
  {
    success: (data) => {
      // ask page handler to setup page
      pageHandler($($.parseHTML(data)), attrs, (page) => {
        // set new page content
        $('#content').html(page);

        // re-apply all page links (there may be new ones).
        $('*[data-page-link]').each((i, pageLink) => {
          pageLink = $(pageLink);
          pageLink.off('click');
          pageLink.one('click', () => {
            go(pageLink.data('page-link'), pageLink.data('page-attrs'));
          });
        });
      });
    },
    error: () => {
      $('#content').html($('<p></p>').text('Error loading content'));
    }
  })
}

/**
 * Set a new camera viewpoint in the 3D model.
 * 
 * Assuming model has cameras named in format 
 * [camera]Camera, it will bind the camera for
 * whichever camera has been passed in as an argument.
 * 
 * @param {string} camera The camera to enable.
 */
function modelSetCamera(camera) {
  $(`#model__${camera}Camera`).attr('bind', 'true');
}

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
