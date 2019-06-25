/**
 * BLOCK: Chart
 */

import besanIcons from './icons.js';
import besanEdit from './edit.js';

( function() {

  const { registerBlockType } = wp.blocks;

  registerBlockType( 'tdg/chart', {
    title: 'Chart',
    description: 'Create a data chart.',
    category: 'widgets',
    keywords: [ 'chart', 'graph', 'data' ],
    icon: besanIcons.block,

    // attributes: {
    //   data: { default: '' },
    //   type: { default: 'bar-horizontal' }
    // },

    edit: besanEdit,
    save: () => { return null; }
  } );

})();
