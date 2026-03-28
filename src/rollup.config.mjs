//js plugins
import { nodeResolve } from '@rollup/plugin-node-resolve'
import commonjs from '@rollup/plugin-commonjs'
import { babel } from '@rollup/plugin-babel'
import terser from '@rollup/plugin-terser'

export default {
	input:'./js/app.js',
	output: {
		file: '../app.js',
		format: 'iife'
	},
	plugins: [
		nodeResolve({
			browser: true,
			preferBuiltins: false
		}),
		commonjs(),
		babel({ 
			babelHelpers: 'bundled', 
			presets: ['@babel/preset-env'],
			exclude: 'node_modules/**'
		}),
		terser()
	  ]
};
