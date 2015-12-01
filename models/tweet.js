var mongoose = require('mongoose');
var Schema = mongoose.Schema;
var markdown = require('markdown').markdown;
var mongid = mongoose.Schema.Types.ObjectId;
var schemaOptions = {
  toObject: {
    virtuals: true
  },
  toJSON: {
    virtuals: true
  }
};


tweetSchema = new Schema({
  id: String,
  content: String,
  _user: {
    type: mongid,
    ref: 'user'
  }
}, schemaOptions);

// tweetSchema.virtual('aciklamaHtml').get(function() {
//   return this.aciklama ? markdown.toHTML(this.aciklama) : "";
// });
//
// besinSchema.virtual('homeUrl').get(function() {
//   return '/besin/detay/' + this._id;
// });

exports.model = mongoose.model('tweet', tweetSchema);
