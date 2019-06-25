/**
 * BLOCK: Chart
 */

//import bbIcons from './icons.js';

( function() {

  const { registerBlockType } = wp.blocks;
  const { } = wp.components;

  registerBlockType( 'tdg/chart', {
    title: 'Chart',
    description: 'Create a data chart.',
    category: 'common',
    keywords: [ 'chart', 'graph', 'data' ],
    //icon: bbIcons.block,

    // Block attribute data.
    attributes: {
    },

    /**
     * Edit UI and functionality.
     */

    edit: ( props ) => {
      // Get the values needed from props.
      const { setAttributes } = props;
      const { } = props.attributes;

      // Declare change event handlers.


      // Return the edit UI.
      return (
        <div>
          <p>Hello world</p>
        </div>
      );
    },

    /**
     * Front-end UI.
     */

    save: ( props ) => {
      // Get the attribute values needed from props.
      const { } = props.attributes;

      // Return the front-end HTML.
      return (
        <div>
          <p>Hello front-end world</p>
        </div>
      );
    }
  });

})();
