class ProjectNameSlugify {

    constructor()
    {
        // The (non-ascii) characters used as keys will be replaced with their (ascii) value.
        this.CHARACTER_MAP = {};
        this.CHARACTER_MAP[199] = "C"; // ‚
        this.CHARACTER_MAP[231] = "c"; // 
        this.CHARACTER_MAP[252] = "u"; // Ÿ
        this.CHARACTER_MAP[251] = "u"; // ž
        this.CHARACTER_MAP[250] = "u"; // œ
        this.CHARACTER_MAP[249] = "u"; // 
        this.CHARACTER_MAP[233] = "e"; // Ž
        this.CHARACTER_MAP[234] = "e"; // 
        this.CHARACTER_MAP[235] = "e"; // ‘
        this.CHARACTER_MAP[232] = "e"; // 
        this.CHARACTER_MAP[226] = "a"; // ‰
        this.CHARACTER_MAP[228] = "a"; // Š
        this.CHARACTER_MAP[224] = "a"; // ˆ
        this.CHARACTER_MAP[229] = "a"; // Œ
        this.CHARACTER_MAP[225] = "a"; // ‡
        this.CHARACTER_MAP[239] = "i"; // •
        this.CHARACTER_MAP[238] = "i"; // ”
        this.CHARACTER_MAP[236] = "i"; // “
        this.CHARACTER_MAP[237] = "i"; // ’
        this.CHARACTER_MAP[196] = "A"; // €
        this.CHARACTER_MAP[197] = "A"; // 
        this.CHARACTER_MAP[201] = "E"; // ƒ
        this.CHARACTER_MAP[230] = "ae"; // ¾
        this.CHARACTER_MAP[198] = "Ae"; // ®
        this.CHARACTER_MAP[244] = "o"; // ™
        this.CHARACTER_MAP[246] = "o"; // š
        this.CHARACTER_MAP[242] = "o"; // ˜
        this.CHARACTER_MAP[243] = "o"; // —
        this.CHARACTER_MAP[220] = "U"; // †
        this.CHARACTER_MAP[255] = "Y"; // Ø
        this.CHARACTER_MAP[214] = "O"; // …
        this.CHARACTER_MAP[241] = "n"; // –
        this.CHARACTER_MAP[209] = "N"; // „

        this.desiredKeyLength = 4;
        this.maxKeyLength = 0;

    }

    getTotalLength(words) {
        return words.join("").length;
    }

    removeIgnoredWords(words) {
        var IGNORED_WORDS = ["THE", "A", "AN", "AS", "AND", "OF", "OR"];

        return words.filter(function (word) {
            return IGNORED_WORDS.indexOf(word) === -1;
        })
    }

    createAcronym(words) {
        var result = "";

        $.each(words, function(i, word) {
            result += word.charAt(0);
        });

        return result;
    }

    getFirstSyllable(word) {
        // Best guess at getting the first syllable
        // Returns the substring up to and including the first consonant to appear after a vowel
        var pastVowel = false;
        var i;
        for (i = 0; i < word.length; i++) {
            if (this.isVowelOrY(word[i])) {
                pastVowel = true;
            } else {
                if (pastVowel) {
                    return word.substring(0, i + 1);
                }
            }
        }
        return word;
    }

    isVowelOrY(c) {
        return c && c.length === 1 && c.search("[AEIOUY]") !== -1;
    }

    generateKey(name)
    {

        name = $.trim(name);

        if (!name) {
            return "";
        }

         // Brute-force chunk-by-chunk substitution and filtering.
         var filtered = [];
         for(var i=0, ii=name.length; i<ii; i++) {
             var sub = this.CHARACTER_MAP[name.charCodeAt(i)];
             filtered.push(sub ? sub : name[i]);
         }

         name = filtered.join('');


        // Split into words
        var words = [];
        $.each(name.split(/\s+/), function(i, word) {
            if (word) {
                // Remove whitespace and punctuation characters (i.e. anything not A-Z)
                word = word.replace(/[^a-zA-Z]/g, "");
                // uppercase the word (NOTE: JavaScript attempts to convert characters like § in to SS)
                word = word.toUpperCase();
                // add the word, should it be worthy.
                word.length && words.push(word);
            }
        });

        // Remove ignored words
        if (this.desiredKeyLength && this.getTotalLength(words) > this.desiredKeyLength) {
            words = this.removeIgnoredWords(words);
        }

        var key;

        if (words.length == 0) {
            // No words were worthy!
            key = "";
        } else if (words.length == 1) {
            // If we have one word, and it is longer than a desired key, get the first syllable
            var word = words[0];
            if (this.desiredKeyLength && word.length > this.desiredKeyLength) {
                key = this.getFirstSyllable(word);
            } else {
                // The word is short enough to use as a key
                key = word;
            }
        } else {
            // If we have more than one word, just take the first letter from each
            key = this.createAcronym(words);
        }

        // Limit the length of the key
        if (this.maxKeyLength && key.length > this.maxKeyLength) {
            key = key.substr(0, this.maxKeyLength);
        }

        return key;
    }
}

export default  ProjectNameSlugify;
