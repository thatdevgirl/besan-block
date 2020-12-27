/**
 * BLOCK: Chart
 */

import besanIcons from './icons.js';
import besanEdit from './edit.js';

( function() {

  const { registerBlockType } = wp.blocks;

  registerBlockType( 'tdg/chart', {
    title: 'Chart',
    description: 'Create a chart from data in a Google sheet.',
    category: 'widgets',
    keywords: [ 'chart', 'graph', 'data' ],
    icon: besanIcons.block,
    edit: besanEdit,
    save: () => { return null; }
  } );

})();
