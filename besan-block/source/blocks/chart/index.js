/**
 * BLOCK: Chart
 */

import { default as Icons } from './icons.js';
import { default as Edit } from './edit.js';
import { default as Metadata } from './block.json';

( function() {

  const { registerBlockType } = wp.blocks;

  registerBlockType( Metadata, {
    icon: Icons.block,
    edit: Edit,
    save: () => { return null; }
  } );

})();
