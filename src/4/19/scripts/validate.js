const validate = {
    'init': () => {
        document.querySelectorAll('#form-main-block div.error').forEach( ( elem ) => elem.remove() )
        document.querySelectorAll('#form-main-block .valid, #form-main-block .invalid').forEach( ( elem ) => {
            elem.classList.remove('valid')
            elem.classList.remove('invalid')
        } )
    },

    'setValid': ( element ) => {
        element.classList.add('valid')
        element.classList.remove('invalid')
    },
    
    'setInvalid': ( element ) => {
        element.classList.remove('valid')
        element.classList.add('invalid')
    },
    
    'setError': ( text ) => {
        const block = document.createElement('div')
        block.setAttribute('class', 'error')
        block.append( document.createTextNode( text ) )
        return block
    },
    
    'toggleError': ( element, error ) => {
        if ( error.length > 0 ) {
            const errorDiv = validate.setError( error )
            element.parentElement.append( errorDiv )
            validate.setInvalid( element )
            return false
        }

        validate.setValid( element )
        return true
    } ,
    
    'title': ( value, element ) => {
        const minlength = 2,
              maxlength = 128,
              regular = /^[A-ZА-ЯЫЁЭҐІЇЄ0-9`ʼ~!@"#№\$%\^&\*\(\)-_\+=\{\}\[\]\|\?\/\.,':;<>\s]+$/iu
        
        let error = ''

        if ( value.length < minlength ) {
            error = 'Необхідно заповнити назву запису'
        } else if ( value.length > maxlength ) {
            error = 'Перевищено допустиму кількість символів у назві запису'
        } else if ( !regular.test( value ) ) {
            error = 'У назві містяться не допустимі символи'
        }

        return validate.toggleError( element, error )
    },
    
    'content': ( value, element ) => {
        const minlength = 2,
              maxlength = 65536,
              regular = /^[A-ZА-ЯЫЁЭҐІЇЄ0-9`ʼ~!@"#№\$%\^&\*\(\)-_\+=\{\}\[\]\|\?\/\.,':;<>\s]+$/ium
        
        let error = ''

        if ( value.length < minlength ) {
            error = 'Необхідно заповнити вміст'
        } else if ( value.length > maxlength ) {
            error = `Вміст має бути не більше ${maxlength} символів`
        } else if ( !regular.test( value ) ) {
            error = 'У полі "Вміст" вказані недопустимі символи'
        }

        return validate.toggleError( element, error )
    },
    
    'date': ( value, element ) => {
        const minlength = 16,
              maxlength = 16,
              regular = /^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])T(0[0-9]|1[0-9]|2[0-3])\:[0-5][0-9]$/
        
        let error = ''

        if ( value.length < minlength ) {
            error = 'Необхідно заповнити дату публікації'
        } else if ( value.length > maxlength ) {
            error = `Значення дати має бути не більше ${maxlength} символів`
        } else if ( !regular.test( value ) ) {
            error = 'Дату запису вказано не коректно'
        }

        return validate.toggleError( element, error )
    },
    
    'category': ( value, element ) => {
        const minlength = 1
        let error = ''

        if ( value.length < minlength ) {
            error = 'Необхідно заповнити категорію'
        }

        return validate.toggleError( element, error )
    },
    
    'cover': ( value, element ) => {
        const minlength = 1
        let error = ''

        if ( value.length < minlength ) {
            error = 'Необхідно додати зображення'
        }

        return validate.toggleError( element, error )
    }
}

const getFormElements = () => {
    const element = {};
    element.title           = document.getElementById( 'post_title_input' )
    element.content         = document.getElementById( 'post_content_input' )
    element.date            = document.getElementById( 'post_date_input' )
    element.category        = document.getElementById( 'post_category_input' )
    element.cover           = document.getElementById( 'post_cover_input' )

    const value = {};
    value.title             = ( element.title.value || '' ).toString()
    value.content           = ( element.content.value || '' ).toString()
    value.date              = ( element.date.value || '' ).toString()
    value.category          = ( element.category.value || '' ).toString()
    value.cover             = ( element.cover.value || '' ).toString()

    return { element, value }
}

const formSubmit = () => {
    const { element, value } = getFormElements()
    validate.init()

    let error = false
    
    for ( let i in value ) {
        if ( !validate[i]( value[i], element[i] ) ) {
            error = true
        }
    }
    
    return !error
}

const coverPreview = function(e) {
    this.parentElement.querySelectorAll('img').forEach( element => element.remove() )
    const [ file ] = this.files
    if (file) {
        const img = document.createElement('img')
        img.setAttribute( 'class', 'preview' );
        img.setAttribute( 'src', URL.createObjectURL(file) )
        this.parentElement.append(img)
    }
}

document.getElementById('form-main-block').onsubmit = formSubmit
document.getElementById('submit_button').onclick = formSubmit
document.getElementById('post_cover_input').onchange = coverPreview