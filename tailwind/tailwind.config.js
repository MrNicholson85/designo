// Set the Preflight flag based on the build target.
const includePreflight = 'editor' === process.env._TW_TARGET ? false : true;

module.exports = {
	presets: [
		// Manage Tailwind Typography's configuration in a separate file.
		require('./tailwind-typography.config.js'),
	],
	content: [
		// Ensure changes to PHP files and `theme.json` trigger a rebuild.
		'./theme/**/*.{php,css,js}',
		'./theme/theme.json',
	],
	theme: {
		// Extend the default Tailwind theme.
		extend: {
			gridTemplateColumns: {
				projectCard: '339px auto',
			},
		},
		screens: {
			sm: '375px',
			md: '768px',
			mid: '1024px',
			lg: '1440px',
			xl: '2560px',
		},
		colors: {
			peach: '#e7816b',
			black: '#1d1c1e',
			eggshell: '#ffffff',
			lightPeach: '#ffad9b',
			darkGrey: '#333136',
			lightGrey: '#f1f3f5',
		},
		fontFamily: {
			jostReg: ['jost-reg', 'sans-serif'],
			jostMed: ['jost-med', 'sans-serif'],
		},
	},
	corePlugins: {
		// Disable Preflight base styles in builds targeting the editor.
		preflight: includePreflight,
	},
	plugins: [
		'prettier-plugin-tailwindcss',
		// Extract colors and widths from `theme.json`.
		require('@_tw/themejson')(require('../theme/theme.json')),

		// Add Tailwind Typography.
		require('@tailwindcss/typography'),

		// Uncomment below to add additional first-party Tailwind plugins.
		// require('@tailwindcss/forms'),
		// require('@tailwindcss/aspect-ratio'),
		// require('@tailwindcss/container-queries'),
	],
};
