/**
 * @param {string} s
 * @param {Element} parent
 * @returns {Element|null}
 */
export const $ = (s, parent = document) => parent.querySelector(s);

/**
 * @param {string} s
 * @param {Element} parent
 * @returns {Array.<Element|null>}
 */
export const $$ = (s, parent = document) => [...parent.querySelectorAll(s)].filter(Boolean);